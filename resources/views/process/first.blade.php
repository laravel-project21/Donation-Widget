<form method="POST" id="step1donationform">
    @csrf
    <div class="formstyle" id="step1">
        <div class="pt-4 px-4 textstyle">Missionary Donation</div>
        <hr>
        <div class="px-4">
            <div class="row">
                <button type="button" class="btn w-50 activebtn type" id="onetime">One-Time</button>
                <button type="button" class="btn w-50 nonactivebtn type" id="monthly">Monthly</button>
                <input type="hidden" value="One-Time" name="type" class="typeval">
                <div class="col-md-6"><label></label><input type="text" name="name"
                        class="form-control bordercolor" placeholder="Donor's Name" autocomplete="off">
                </div>
                <div class="col-md-6"><label class="error-text email_err error mb-1"></label><input type="email" name="email"
                        class="form-control bordercolor" placeholder="Donor's Email" autocomplete="off">
                </div>
                <div class="col-md-12"><select class="form-control my-3 bordercolor" name="business_name">
                        <option value="Night Bright">Night Bright</option>
                        <option value="Rome and Kate Johnson">Rome and Kate Johnson</option>
                        <option value="Ronald & Esther Marcotte">Ronald & Esther Marcotte</option>
                        <option value="Rory and Nicole Donaldson">Rory and Nicole Donaldson</option>
                        <option value="Stephen Cahill">Stephen Cahill</option>
                        <option value="Steven Hylland">Steven Hylland</option>
                        <option value="Steven Sundheim">Steven Sundheim</option>
                        <option value="Stu Shipper">Stu Shipper</option>
                        <option value="Test Member">Test Member</option>
                        <option value="Umair Ali">Umair Ali</option>
                        <option value="Vandana Gaikwad">Vandana Gaikwad</option>
                        <option value="Vijeta Mishra">Vijeta Mishra</option>
                        <option value="Web Strives">Web Strives</option>
                        <option value="Wogal Apklamp">Wogal Apklamp</option>
                        <option value="komal Rajpure">komal Rajpure</option>
                        <option value="mike john">mike john</option>
                        <option value="shayan nasir">shayan nasir</option>
                        <option value="shayan nasir">shayan nasir</option>
                        <option value="uche uche">uche uche</option>
                    </select></div>
                <div class="col-md-3"><button type="button" class="btn w-100 mb-3 nonactiveamountbtn payment"
                        value="10">10$</button>
                </div>
                <div class="col-md-3"><button type="button" class="btn w-100 mb-3 activeamountbtn payment"
                        value="25">25$</button>
                </div>
                <div class="col-md-3"><button type="button" class="btn w-100 mb-3 nonactiveamountbtn payment"
                        value="50">50$</button>
                </div>
                <div class="col-md-3"><button type="button" class="btn w-100 mb-3 nonactiveamountbtn payment"
                        value="100">100$</button>
                </div>
                <div class="col-md-3"><button type="button" class="btn w-100 mb-3 nonactiveamountbtn payment"
                        value="250">250$</button>
                </div>
                <div class="col-md-3"><button type="button" class="btn w-100 mb-3 nonactiveamountbtn payment"
                        value="500">500$</button>
                </div>
                <div class="col-md-3"><button type="button" class="btn w-100 mb-3 nonactiveamountbtn payment"
                        value="1000">1000$</button>
                </div>
                <div class="col-md-3"><input type="text" class="form-control mb-3 amount" placeholder="Other"><input
                        type="hidden" name="amt" class="amt" value="25">
                </div>
                <div class="col-md-12"><span class="addmessage msgtext">+ Add a
                        message</span>
                    <input type="text" name="message" class="form-control message bordercolor1">
                </div>
            </div>
        </div>
        <hr>
        <div class="pb-4 pt-2 px-4">
            <input type="checkbox" name="check" value="0"><span class="px-2">Stay
                Anonymous</span>
            <button type="submit" class="btn btnstyle" id="continue">Continue</button>
        </div>
    </div>
</form>
