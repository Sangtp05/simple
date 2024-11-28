$(document).ready(function () {
    // Get routes from data attributes
    const cartContent = document.getElementById("cart-content");
    const CART_GET_URL = cartContent.dataset.getUrl;
    const CART_UPDATE_URL = cartContent.dataset.updateUrl;
    const CSRF_TOKEN = cartContent.dataset.token;

    function loadCart() {
        $.ajax({
            url: CART_GET_URL,
            method: "GET",
            success: function (response) {
                console.log(response);
                if (response.carts.length > 0) {
                    // Clone template
                    const template = document
                        .getElementById("cart-template")
                        .content.cloneNode(true);
                    const tbody = template.querySelector("#cart-items");

                    // Add cart items
                    response.carts.forEach((cart) => {
                        const urlImage = `/storage/${cart.product.primary_image.image}`;
                        const tr = document.createElement("tr");
                        tr.innerHTML = `
                        <td class="cart-col-product-image">
                            <div class="cart-product-image d-flex align-items-center">
                                <img src="${urlImage}" 
                                     alt="${cart.product.name}"
                                     class="img-thumbnail me-3"
                                     >
                            </div>
                        </td>
                        <td class="product-price" data-price="${cart.price}">
                                <p class="product-name">${cart.product.name}</p>
                                <p class="product-price">${formatMoney(cart.price)}</p>
                            </div>
                        </td>
                        <td class="quantity-col">
                            <div class="quantity-control">
                                <div class="cart-input-group">
                                    <button type="button" 
                                        class="button-cart button-cart-minus decrease-quantity" 
                                        data-product-id="${cart.product_id}">
                                        <img src="/img/icons/minus.svg" alt="Trừ sản phẩm">
                                    </button>
                                    
                                    <input type="number" 
                                        class="input-quantity update-quantity" 
                                        value="${cart.quantity}" 
                                        min="1" 
                                        data-product-id="${cart.product_id}">
                                    
                                    <button type="button" 
                                        class="button-cart button-cart-plus increase-quantity"
                                        data-product-id="${cart.product_id}">
                                        <img src="/img/icons/plus.svg" alt="Thêm sản phẩm">
                                    </button>
                                </div>
                                
                                <button type="button" 
                                    class="button-cart button-cart-remove remove-product" 
                                    data-product-id="${cart.product_id}">
                                    <img src="/img/icons/delete.svg" alt="Xóa sản phẩm">
                                </button>
                            </div>
                        </td>
                        <td class="product-total">
                            ${formatMoney(cart.price * cart.quantity)}
                        </td>
                    `;
                        tbody.appendChild(tr);
                    });

                    template.querySelector(".cart-total").textContent =
                        formatMoney(response.total);

                    $("#cart-content").html(template);
                } else {
                    const emptyTemplate = document
                        .getElementById("empty-cart-template")
                        .content.cloneNode(true);
                    $("#cart-content").html(emptyTemplate);
                }
                bindEvents();
            },
        });
    }

    // Update cart
    function updateCart(productId, quantity, inputGroup) {

        console.log(productId, quantity);
        // Disable input và buttons
        inputGroup.addClass('loading');
        inputGroup.find('input, button').prop('disabled', true);
        
        $.ajax({
            url: CART_UPDATE_URL,
            method: "POST",
            data: {
                _token: CSRF_TOKEN,
                product_id: productId,
                quantity: quantity,
            },
            success: function (response) {
                if (response.success) {
                    loadCart();
                }
            },
            error: function (xhr) {
                // Enable lại input và buttons nếu có lỗi
                inputGroup.removeClass('loading');
                inputGroup.find('input, button').prop('disabled', false);
            }
        });
    }

    // Bind events
    function bindEvents() {
        $(".decrease-quantity").on("click", function () {
            const inputGroup = $(this).closest('.cart-input-group');
            const input = inputGroup.find(".update-quantity");
            const currentValue = parseInt(input.val());
            if (currentValue > 1) {
                updateCart($(this).data("product-id"), currentValue - 1, inputGroup);
            }
        });

        $(".increase-quantity").on("click", function () {
            const inputGroup = $(this).closest('.cart-input-group');
            const input = inputGroup.find(".update-quantity");
            const currentValue = parseInt(input.val());
            updateCart($(this).data("product-id"), currentValue + 1, inputGroup);
        });

        $(".update-quantity").on("change", function () {
            const inputGroup = $(this).closest('.cart-input-group');
            const quantity = parseInt($(this).val());
            if (quantity >= 1) {
                updateCart($(this).data("product-id"), quantity, inputGroup);
            } else {
                $(this).val(1);
                updateCart($(this).data("product-id"), 1, inputGroup);
            }
        });

        $(".remove-product").on("click", function () {
            const button = $(this);
            if (confirm("Bạn có chắc muốn xóa sản phẩm này?")) {
                button.prop('disabled', true).css('cursor', 'not-allowed');
                updateCart($(this).data("product-id"), 0, button.prev('.cart-input-group'));
            }
        });
    }

    // Format money
    function formatMoney(amount) {
        return new Intl.NumberFormat("vi-VN", {
            style: "currency",
            currency: "VND",
        }).format(amount);
    }

    // Initial load
    loadCart();
});
