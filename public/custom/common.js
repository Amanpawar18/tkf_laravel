$(document).ready(function () {
    $(".update-status").change(function () {
        // alert('status');
        var url = $(this).data("url");
        var id = $(this).data("id");
        var _token = $('input[name="_token"]').val();
        $.post(
            url,
            {
                _token: _token,
                id: id,
            },
            function (response) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                });
                Toast.fire({
                    icon: response.type,
                    title: response.message,
                });
            }
        );
    });

    $('.ajax-post-request').click(function () {

        var url = $(this).data("url");
        var dataElement = $(this).data("delete-element");
        var _token = $('input[name="_token"]').val();

        $.post(url, { _token }, function (response) {
            if (response) {
                if ($('#' + dataElement).length) {
                    $('#' + dataElement).remove();
                }
            }
        });

    });

    $('.increase').click(function () {


        var quantity = $(this).siblings('.quantity');

        // increasing quantity value
        var value = parseInt(quantity.val(), 10);
        value = isNaN(value) ? 0 : value;
        if (value >= 9) {
            value = 9;
        } else {
            value++;
        }


        // updating quantity value
        $(this).siblings('.quantity').val(value);

    })

    $('.decrease').click(function () {


        var quantity = $(this).siblings('.quantity');

        // increasing quantity value
        var value = parseInt(quantity.val(), 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
        } else {
            value = 1;
        }

        // setting quantity value
        $(this).siblings('.quantity').val(value);

    })

    $('.decrease1').click(function () {

        var itemId = $(this).data('item-id'); // getting item id
        var price = $('#price-' + itemId).val(); // getting price
        var quantity = $('#quantity-' + itemId).val(); // getting quantity

        // decreasing the quantity
        var value = parseInt(quantity, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
        } else {

            value = 1;
            // value < 1 ? value = 1 : '';
        }

        // setting the quantity
        $('#quantity-' + itemId).val(value);

        // updating cost
        var cost = price * value;
        cost = isNaN(cost) ? 0 : cost;
        $('#productCost-' + itemId).html(cost);
    })


});
