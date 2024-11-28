function checkAuthAndGetCart() {
    $.ajax({
        url: '/check-auth',
        method: 'GET',
        success: function(response) {
            if (response.authenticated) {
                getCart();
            }
        },
        error: function() {
            console.log('Lỗi kiểm tra đăng nhập');
        }
    });
}

function getCart() {
    $.ajax({
        url: '/api/cart',
        method: 'GET',
        success: function(response) {
            console.log('response', response);
            if (response) {
                const count = response.cart.length;
                if (count > 0) {
                    $('#cart-icon').addClass('has-items');
                }
            }
        }
    });
}

$(document).ready(function() {
    checkAuthAndGetCart();
});