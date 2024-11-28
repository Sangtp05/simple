$(document).ready(function(){
    $('.gallery-main').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
    });

    // Quantity control
    $('.decrease-quantity').on('click', function() {
        const input = $(this).siblings('.input-quantity');
        const currentValue = parseInt(input.val());
        if (currentValue > 1) {
            input.val(currentValue - 1);
        }
    });

    $('.increase-quantity').on('click', function() {
        const input = $(this).siblings('.input-quantity');
        const currentValue = parseInt(input.val());
        input.val(currentValue + 1);
    });

    $('.input-quantity').on('change', function() {
        const value = parseInt($(this).val());
        if (value < 1 || isNaN(value)) {
            $(this).val(1);
        }
    });

    // Add to cart
    $('.add-to-cart-detail').on('click', function() {
        const button = $(this);
        const productId = button.data('product-id');
        const quantity = button.parent().find('.input-quantity').val();
        
        button.prop('disabled', true);
        
        $.ajax({
            url: url_update_cart,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    if (response.cartCount) {
                        $('#cart-count').text(response.cartCount);
                    }
                } else {
                }
            },
            error: function() {
            },
            complete: function() {
                button.prop('disabled', false);
            }
        });
    });
});
