<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;

Route::get('/', [DonationController::class, 'view']);
Route::post('donation/process-first', [DonationController::class, 'process_first'])->name('processfirst');
Route::post('donation/process-second', [DonationController::class, 'process_second'])->name('processsecond');
Route::get('checkout/{id}', [DonationController::class, 'paymentpage'])->name('stripe.checkout');
