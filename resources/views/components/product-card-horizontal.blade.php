<div class="card mb-3 horizontal-product-card">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ $product->image }}"
                class="img-fluid rounded-start h-100 w-100 object-fit-cover"
                alt="{{ $product->name }}"
                onerror="this.src='/images/default-product.jpg'">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <h5 class="card-title mb-1">{{ $product->name }}</h5>
                    @if($product->discount_price)
                    <div class="badge bg-danger">-{{ number_format((($product->price - $product->discount_price) / $product->price) * 100) }}%</div>
                    @endif
                </div>

                <div class="mb-2">
                    @if($product->discount_price)
                    <span class="text-danger fw-bold me-2">{{ number_format($product->discount_price) }}đ</span>
                    <span class="text-muted text-decoration-line-through">{{ number_format($product->price) }}đ</span>
                    @else
                    <span class="text-danger fw-bold">{{ number_format($product->price) }}đ</span>
                    @endif
                </div>

                <p class="card-text text-muted mb-2 product-description">
                    {{ Str::limit($product->description, 100) }}
                </p>

                <div class="d-flex align-items-center mb-2">
                    <div class="ratings me-2">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star{{ $i <= $product->rating ? '-fill' : '' }} text-warning"></i>
                            @endfor
                    </div>
                    <span class="text-muted small">({{ $product->reviews_count }} đánh giá)</span>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary btn-sm add-to-cart"
                        data-product-id="{{ $product->id }}">
                        <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                    </button>
                    <a href="{{ route('products.show', [
                        'categoryParent' => $product->category->parent->slug,
                        'categoryChild' => $product->category->slug,
                        'slug' => $product->slug
                    ]) }}"
                        class="btn btn-outline-secondary btn-sm">
                        Chi tiết
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>