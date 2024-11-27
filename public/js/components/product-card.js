$(document).ready(function() {
    $('.add-to-cart').click(function() {
        const productId = $(this).data('product-id');
        
        $.ajax({
            url: '/cart/add',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: 1,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Hiển thị thông báo thành công
                toastr.success('Đã thêm sản phẩm vào giỏ hàng');
                
                // Cập nhật số lượng giỏ hàng trên header (nếu có)
                if(response.cartCount) {
                    $('#cart-count').text(response.cartCount);
                }
            },
            error: function() {
                toastr.error('Có lỗi xảy ra. Vui lòng thử lại');
            }
        });
    });
}); 