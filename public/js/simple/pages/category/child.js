$(document).ready(function() {
    let selectedSizes = [];
    let selectedColors = [];
    
    // Load filters
    function loadFilters() {
        $.ajax({
            url: `/api/categories/${categoryId}/filters`,
            method: 'GET',
            success: function(response) {
                // Render size filters
                const sizeFilters = response.sizes.map(size => `
                    <div class="form-check">
                        <input class="form-check-input size-filter" type="checkbox" 
                            value="${size}" id="size-${size}">
                        <label class="form-check-label" for="size-${size}">
                            ${size}
                        </label>
                    </div>
                `).join('');
                $('.size-filters').html(sizeFilters);

                // Render color filters
                const colorFilters = response.colors.map(color => `
                    <div class="form-check">
                        <input class="form-check-input color-filter" type="checkbox" 
                            value="${color}" id="color-${color}">
                        <label class="form-check-label" for="color-${color}">
                            ${color}
                        </label>
                    </div>
                `).join('');
                $('.color-filters').html(colorFilters);
            }
        });
    }

    // Load products
    function loadProducts() {
        $('.loading-spinner').removeClass('d-none');
        $('.product-list').html('');

        $.ajax({
            url: `/api/categories/${categoryId}/products`,
            method: 'GET',
            data: {
                sizes: selectedSizes,
                colors: selectedColors
            },
            success: function(response) {
                console.log(response);
                const products = response.map(product => `
                    <div class="col-lg-4 col-md-4 col-6 mb-4">
                        <div class="h-100 vertical-product-card">
                            <div class="position-relative">
                                <img src="${product.images[0]?.image_url}" 
                                    class="card-img-top product-image"
                                    alt="${product.name}"
                                    loading="lazy"
                                    onerror="this.src='/img/pages/product/default.jpg'">
                            </div>
                            <div class="vertical-product-card-body d-flex flex-column">
                                <h5 class="card-title product-title mb-1">
                                    <a href="/products/${product.category.parent.slug}/${product.category.slug}/${product.slug}" 
                                       class="text-decoration-none text-dark">
                                        ${product.name}
                                    </a>
                                </h5>
                                <div class="mb-2">
                                    ${product.sale_price ? 
                                        `<span class="text-danger me-2 price">${formatPrice(product.sale_price)}</span>
                                         <span class="text-muted price-old">${formatPrice(product.price)}</span>` :
                                        `<span class="text-danger price">${formatPrice(product.price)}</span>`
                                    }
                                </div>
                                <p class="card-text text-muted small product-description">
                                    ${product.description}
                                </p>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-dark w-100 view-detail">
                                    <a href="/products/${product.category.parent.slug}/${product.category.slug}/${product.slug}"
                                       class="text-decoration-none text-white">
                                        Xem chi tiết
                                    </a>
                                </button>
                                ${isAuthenticated ? 
                                    `<button class="btn btn-primary add-to-cart" data-product-id="${product.id}">
                                        <img src="/img/icons/cart.svg" alt="cart" class="icon_button">
                                     </button>` :
                                    `<a href="/login" class="btn btn-primary btn-login">
                                        <img src="/img/icons/user.svg" alt="cart" class="icon_button">
                                     </a>`
                                }
                            </div>
                        </div>
                    </div>
                `).join('');
                
                $('.product-list').html(products);
                $('.loading-spinner').addClass('d-none');
            }
        });
    }

    // Format price
    function formatPrice(price) {
        return new Intl.NumberFormat('vi-VN').format(price) + 'đ';
    }

    // Initial load
    loadFilters();
    loadProducts();

    // Handle filter changes
    $(document).on('change', '.size-filter', function() {
        selectedSizes = $('.size-filter:checked').map(function() {
            return $(this).val();
        }).get();
        loadProducts();
    });

    $(document).on('change', '.color-filter', function() {
        selectedColors = $('.color-filter:checked').map(function() {
            return $(this).val();
        }).get();
        loadProducts();
    });
});