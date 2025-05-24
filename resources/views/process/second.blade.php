<form method="POST" id="step2donationform">
    @csrf
    <input type="hidden" name="email" id="email" value="">
    <div class="formstyle" id="step2">
        <div class="pt-4 px-4 textstyle1"><i class="bi bi-arrow-left iconstyle"></i>Final Details</div>
        <hr>
        <div>
            <div class="row px-4">
                <div class="textstyle2"><span>Donation</span><span class="textstyle3">$<span
                            id="getamount"></span></span></div>
                <div class="my-2 textstyle2"><span>Credit card
                        processing fees</span>
                </div>
                <div class="col-md-8"><select class="form-control textstyle2" id="selectpaymentmethod"
                        name="paymentmethod">
                        <option value="0.00">Select Payment Method</option>
                        <option value="0.98">AMEX Card</option>
                        <option value="0.92">Visa & Others</option>
                        <option value="0.22">US Bank Account</option>
                        <option value="1.11">Cash App Pay</option>
                    </select>
                    <div class="my-4 textstyle4">You pay the CC fee so
                        100%
                        of your donation goes to your chosen missionary or cause.</div>
                </div>
                <div class="col-md-4"><span class="textstyle5" id="paymentmethod"></span></div>
                <hr>
            </div>
            <div class="row py-3 px-4 mx-0 bgcolor">
                <div class="col-md-8">
                    <div class="textstyle2">Add a tip to support Night
                        Bright
                    </div>
                    <div class="my-4 textstyle4"><span class="textcolor">Why Tip?</span>
                        Night Bright does not charge any
                        platform fees and relies on your generosity to support this free service.
                    </div>
                </div>
                <div class="col-md-4"><select class="form-control textstyle5" id="tip">
                        <option value="0">0%</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="12" selected>12%</option>
                        <option value="15">15%</option>
                        <option value="20">20%</option>
                    </select></div>
            </div>
            <div class="pt-3 px-4">
                <input type="checkbox" name="check" value="1" checked><span class="px-2 textstyle6">Allow
                    Night Bright Inc to contact me</span>
            </div>
        </div>
        <hr>
        <div class="pb-4 mb-4 px-4">
            <input type="hidden" name="famount" id="famount" value="">
            <input type="hidden" name="tip" id="tipamount" value="">
            <button type="submit" class="btn btnstyle">Finish<span id="finalamount"></span></button>
        </div>
    </div>
</form>
