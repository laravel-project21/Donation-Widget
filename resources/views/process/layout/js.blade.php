<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#loading').hide();
    $('.message').hide();
    $('#onetime').css('border-top-right-radius', '0px');
    $('#onetime').css('border-bottom-right-radius', '0px');
    $('#monthly').css('border-top-left-radius', '0px');
    $('#monthly').css('border-bottom-left-radius', '0px');
    $('.addmessage').click(function() {
        $('.message').show().focus();
        $('.addmessage').hide();
    });
    $('#monthly').click(function() {
        $(this).removeClass('nonactivebtn');
        $(this).addClass('activebtn');
        $('#onetime').removeClass('activebtn');
        $('#onetime').addClass('nonactivebtn');
    });
    $('#onetime').click(function() {
        $(this).removeClass('nonactivebtn');
        $(this).addClass('activebtn');
        $('#monthly').removeClass('activebtn');
        $('#monthly').addClass('nonactivebtn');
    });
    $('.type').click(function() {
        var type = $(this).text();
        $('.typeval').val(type);
    });
    $('.payment').click(function() {
        var payment = $(this).val();
        $('.amt').val(payment);
        $('.payment').each(function() {
            if ($(this).val() === payment) {
                $(this).addClass('activeamountbtn');
                $(this).removeClass('nonactiveamountbtn');
            } else {
                $(this).removeClass('activeamountbtn');
                $(this).addClass('nonactiveamountbtn');
            }
        });
    });
    $('.amount').on("focus", function() {
        $('.payment').removeClass('activeamountbtn');
        $('.payment').addClass('nonactiveamountbtn');
    });
    $('.amount').on("input", function() {
        var payment = $(this).val();
        $('.amt').val(payment);

    });

    $(document).ready(function() {
        $('#step2donationform').hide();
        $('#step1donationform').submit(function(event) {
            event.preventDefault();
            var formdata = new FormData($('#step1donationform')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('processfirst') }}",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    $('.error-text').css('display', 'none');
                    if ($.isEmptyObject(response.errors)) {
                        $('#step1donationform').hide();
                        $('#step2donationform').show();
                        $('#getamount').text(response.amount);
                        $('#email').val(response.email);
                        var tip = parseFloat(response.amount) * (parseFloat($(
                            '#tip').val())) / 100;
                        $('#tipamount').val(tip);
                        var finalamount = parseFloat(response.amount) + parseFloat($(
                            '#selectpaymentmethod').val()) + tip;
                        $('#finalamount').text('($' + finalamount.toFixed(2) + ')');
                        $('#famount').val(finalamount.toFixed(2));
                        $('#selectpaymentmethod').on('change', function() {
                            var paymentmethodval = $(this).val();
                            $('#paymentmethod').text('$' + paymentmethodval);
                            var tip = parseFloat(response.amount) * (parseFloat($(
                                    '#tip')
                                .val())) / 100;
                            $('#tipamount').val(tip);
                            var finalamount = parseFloat(response.amount) +
                                parseFloat(
                                    paymentmethodval) + tip;
                            $('#finalamount').text('($' + finalamount.toFixed(2) +
                                ')');
                            $('#famount').val(finalamount.toFixed(2));
                        });
                        $('#tip').on('change', function() {
                            var tip = parseFloat(response.amount) * (parseFloat($(
                                    this)
                                .val())) / 100;
                            $('#tipamount').val(tip);
                            var finalamount = parseFloat(response.amount) +
                                parseFloat($(
                                    '#selectpaymentmethod').val()) + tip;
                            $('#finalamount').text('($' + finalamount.toFixed(2) +
                                ')');
                            $('#famount').val(finalamount.toFixed(2));
                        });

                    } else {
                        $.each(response.errors, function(key, value) {
                            $('.' + key + '_err').css('display', 'block');
                            $('.' + key + '_err').text(value);
                        });
                    }
                },
            });
        });

        $('#step2donationform').submit(function(event) {
            event.preventDefault();
            var formdata = new FormData($('#step2donationform')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('processsecond') }}",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    $('.error-text').css('display', 'none');
                    if ($.isEmptyObject(response.errors)) {
                        $('#loading').show();
                        $('#step1donationform').hide();
                        $('#step2donationform').hide();
                        setTimeout(function() {
                            window.location.href = response.url;
                        }, 2000);
                    } else {

                    }
                },
            });
        });

        $('#paymentmethod').text('$0.00');

    });
</script>
