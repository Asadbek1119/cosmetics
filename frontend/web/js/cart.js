$(document).ready(function () {

    $('.add-to-cart').click(function (event) {

        event.preventDefault();

        let url = $(this).attr('href');

        $.ajax({

            'url': url,

            'success': function (result) {

                let cartCount = result.cartCount;
                let message = result.message;

                toastr.success(message);
                $('#view-cart').html(cartCount);

            }

        });

    });

    $(document).on('click', '.remove_from_cart1', function (event) {

        event.preventDefault();
        let url = $(this).attr('href');

        $.ajax({
            'url': url,
            'success': function (result) {

                let cartCount = result.cartCount;
                let message = result.message;
                toastr.success(message);
                $('#totalajaxcall').load(location.href + ' .totalpricingload');
                $('.shopping_cart').html(result.yourCartProduct);
                $('#view-cart').html(cartCount);

            },

        });
    });

});

