$(document).ready(function () {
    checkAuthAndGetCart();
});

function checkAuthAndGetCart() {
    $.ajax({
        url: "/check-auth",
        method: "GET",
        success: function (response) {
            if (response.authenticated) {
                getCart();
            }
        },
        error: function () {
            console.log("Lỗi kiểm tra đăng nhập");
        },
    });
}

function getCart() {
    $.ajax({
        url: "/api/cart",
        method: "GET",
        success: function (response) {
            console.log(response);
            if (response.carts.length > 0) {
                $("#cart-icon-count").addClass("has-items").text(response.carts.length);
            } else {
                $("#cart-icon-count").removeClass("has-items").text("");
            }
        },
    });
}
