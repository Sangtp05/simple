$(document).ready(function () {
    $(".add-to-cart").click(function () {
        const productId = $(this).data("product-id");

        $.ajax({
            url: "/api/cart/update",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                product_id: productId,
                quantity: 1,
            },
            success: function (response) {
                getCart();
            },
            error: function () {},
        });
    });
});
