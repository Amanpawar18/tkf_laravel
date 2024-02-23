$(document).ready(function () {

    $('#checkout-button').on('click', function () {
        if ($('#spinner').length > 0) {
            $('#spinner').addClass('show');
            $('#spinner').removeClass('bg-white');
            $('#spinner').css('z-index', 999)
        }
        var subTotal = $('input[name=sub_total]').val();
        var address = $('input[name=address]').val();
        var redirectUrl = $(this).data('redirect-url');
        var razorpayUrl = $(this).data('razorpay-url');

        $.post(razorpayUrl, { _token: $('input[name=_token]').val(), sub_total: subTotal }, function (response) {
            if (response) {
                razorpayInitialize(subTotal, response, redirectUrl, address);
            }
        });
    });

    function razorpayInitialize(subTotal, orderId, redirectUrl, address) {

        var options = {
            key: razorPayKey,
            order_id: orderId,
            handler: function (a, e) {
                $(".loading-icon").show();
                var data = {
                    _token: $('input[name=_token]').val(),
                    razorpay_order_id: a.razorpay_order_id,
                    razorpay_payment_id: a.razorpay_payment_id,
                    razorpay_signature: a.razorpay_signature,
                    amount: subTotal,
                    address: address,
                };
                $.post(redirectUrl, data, function (response) {
                    window.location.href = response;
                });
            },
        };
        var rzp = new Razorpay(options);
        rzp.open();
    }
});
