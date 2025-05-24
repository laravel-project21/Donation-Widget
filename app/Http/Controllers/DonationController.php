<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class DonationController extends Controller
{
    public function view()
    {
        return view('process.main');
    }
    public function process_first(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            ],
            ['email.required' => 'Email is required']
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $data = Donation::where('email', $request->email)->first();
        if ($data != null) {
            $data->name = $request->name;
            $data->type = $request->type;
            $data->donation = $request->amt;
            $data->check = $request->check;
            $data->message = $request->message;
            $data->save();
        } else {
            $data = new Donation();
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $acc = \Stripe\Account::create([
                'type' => 'standard',
                'country' => 'US',
                'email' => $request->email,
                'business_profile' => [
                    'name' => $request->business_name
                ],
            ]);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->type = $request->type;
            $data->account_name = $request->business_name;
            $data->account_id = $acc->id;
            $data->donation = $request->amt;
            $data->check = $request->check;
            $data->message = $request->message;
            $data->save();
        }
        return response()->json(['amount' => Donation::where('email', $request->email)->value('donation'), 'email' => $request->email]);
    }

    public function process_second(Request $request)
    {
        $data = Donation::where('email', $request->email)->first();
        $data->pfee = $request->paymentmethod;
        $data->tip = $request->tip;
        $data->amount = $request->famount;
        $data->save();
        $d = Donation::where('email', $request->email)->first();
        return response()->json(['url' => route('stripe.checkout', ['id'=>$d->id])]);
    }

    public function paymentpage(Request $request)
    {
        $d = Donation::find($request->id);
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Donation',
                        ],
                        'unit_amount' => $d->donation * 100,
                    ],
                    'quantity' => 1,
                ],
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Processing Fee',
                        ],
                        'unit_amount' => $d->pfee * 100,
                    ],
                    'quantity' => 1,
                ],
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Tip',
                        ],
                        'unit_amount' => $d->tip * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'success_url' => url('/'),
            'cancel_url' => url('/'),
            'submit_type' => 'donate',
        ]);
        return redirect($session->url);
    }
}
