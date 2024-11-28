<div class="h-100 vertical-product-card">
    <div class="position-relative">
        <img src="{{ Storage::url($product->images->first()->image) }}"
            class="card-img-top product-image"
            alt="{{ $product->name }}"
            loading="lazy"
            onerror="this.src = `{{ asset('img/pages/product/default.jpg') }}`">
    </div>
    <div class="vertical-product-card-body d-flex flex-column">
        <h5 class="card-title product-title mb-1">
            <a href="{{ route('products.show', [
    'categoryParent' => $product->category->parent->slug,
    'categoryChild' => $product->category->slug,
                'slug' => $product->slug
            ]) }}"
                class="text-decoration-none text-dark">
                {{ $product->name }}
            </a>
        </h5>
        <div class="mb-2">
            @if($product->sale_price)
            <span class="text-danger me-2 price">{{ number_format($product->sale_price) }}đ</span>
            <span class="text-muted price-old">{{ number_format($product->price) }}đ</span>
            @else
            <span class="text-danger price">{{ number_format($product->price) }}đ</span>
            @endif
        </div>
        <p class="card-text text-muted small product-description">
            {{ $product->description }}
        </p>
    </div>
    <div class="d-flex">
        <button class="btn btn-dark w-100 view-detail">
            <a href="{{ route('products.show', [
                'categoryParent' => $product->category->parent->slug,
                'categoryChild' => $product->category->slug,
                'slug' => $product->slug
            ]) }}"
                class="text-decoration-none text-white">
                Xem chi tiết</a>
        </button>
        @auth('customer')
        <button class="btn btn-primary add-to-cart"
            data-product-id="{{ $product->id }}">
                <img src="{{ asset('img/icons/cart.svg') }}" alt="cart" class="icon_button">
            </button>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary btn-login">
            <img src="{{ asset('img/icons/user.svg') }}" alt="cart" class="icon_button">
        </a>
        @endauth
    </div>
</div>