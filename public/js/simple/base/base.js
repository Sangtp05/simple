$(document).ready(function () {
    checkAuthAndGetCart();

    // Xử lý hamburger menu
    $('.hamburger-btn').click(function(e) {
        e.stopPropagation();
        const $menu = $('.group_menu');
        
        if ($menu.is(':hidden')) {   
            // Ẩn search nếu đang mở
            $('.menu_search.d-md-none').hide();
            // Hiển thị menu
            $menu.show().css('display', 'block');
        } else {
            hideWithAnimation($menu);
        }
    });

    // Xử lý search button
    $('.search-btn').click(function(e) {
        e.stopPropagation();
        const $search = $('.menu_search.d-md-none');
        
        if ($search.is(':hidden')) {
            // Ẩn menu nếu đang mở
            $('.group_menu').hide();
            // Hiển thị search
            $search.show().css('display', 'block');
            $search.find('input').focus();
        } else {
            hideWithAnimation($search);
        }
    });

    // Ngăn việc click inside làm ẩn menu
    $('.group_menu, .menu_search.d-md-none').click(function(e) {
        e.stopPropagation();
    });

    // Ẩn khi click outside
    $(document).click(function() {
        const $menu = $('.group_menu');
        const $search = $('.menu_search.d-md-none');
        
        if ($menu.is(':visible')) {
            hideWithAnimation($menu);
        }
        if ($search.is(':visible')) {
            hideWithAnimation($search);
        }
    });

    // Hàm ẩn với animation
    function hideWithAnimation($element) {
        $element.addClass('sliding-up');
        setTimeout(() => {
            $element.hide().removeClass('sliding-up');
        }, 300);
    }

    let searchTimeout;
    $('.search_input_field').on('input', function() {
        clearTimeout(searchTimeout);
        const query = $(this).val();
        searchTimeout = setTimeout(function() {
            if (query.length >= 2) {
                window.location.href = `/search?q=${encodeURIComponent(query)}`;
            }
        }, 500);
    });
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
