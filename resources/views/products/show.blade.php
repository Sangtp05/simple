@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/product-card.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/components/product-card.js') }}"></script>
@endpush
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="product-gallery">
                <div class="main-image mb-3">
                    <img src="{{ $product->image }}" class="img-fluid" alt="{{ $product->name }}">
                </div>
                @if($product->images->count() > 0)
                <div class="thumbnail-images row">
                    @foreach($product->images as $image)
                    <div class="col-3">
                        <img src="{{ $image->url }}" class="img-fluid thumbnail" alt="{{ $product->name }}">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h1 class="product-title mb-3">{{ $product->name }}</h1>

            <div class="product-price mb-4">
                @if($product->sale_price)
                <span class="sale-price">{{ number_format($product->sale_price) }}đ</span>
                <span class="original-price text-muted text-decoration-line-through">
                    {{ number_format($product->price) }}đ
                </span>
                @else
                <span class="price">{{ number_format($product->price) }}đ</span>
                @endif
            </div>

            <div class="product-description mb-4">
                {!! $product->short_description !!}
            </div>

            <!-- Form thêm vào giỏ hàng -->
            <form action="{{ route('cart.add') }}" method="POST" class="mb-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="quantity-selector mb-3">
                    <label for="quantity" class="form-label">Số lượng:</label>
                    <div class="input-group" style="width: 130px;">
                        <button type="button" class="btn btn-outline-secondary" onclick="decrementQuantity()">-</button>
                        <input type="number" class="form-control text-center" id="quantity" name="quantity" value="1" min="1">
                        <button type="button" class="btn btn-outline-secondary" onclick="incrementQuantity()">+</button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Thêm vào giỏ hàng</button>
            </form>

            <!-- Thông tin thêm -->
            <div class="additional-info">
                <p><strong>Mã sản phẩm:</strong> {{ $product->sku }}</p>
                <p><strong>Danh mục:</strong> {{ $product->category->name }}</p>
                @if($product->stock_status)
                <p><strong>Tình trạng:</strong>
                    <span class="text-success">Còn hàng</span>
                </p>
                @else
                <p><strong>Tình trạng:</strong>
                    <span class="text-danger">Hết hàng</span>
                </p>
                @endif
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description">
                        Mô tả sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="specification-tab" data-bs-toggle="tab" href="#specification">
                        Thông số kỹ thuật
                    </a>
                </li>
            </ul>
            <div class="tab-content py-4" id="productTabsContent">
                <div class="tab-pane fade show active" id="description">
                    {!! $product->description !!}
                </div>
                <div class="tab-pane fade" id="specification">
                    {!! $product->specifications !!}
                </div>
            </div>
        </div>
    </div>

    @if($relatedProducts->count() > 0)
    <div class="related-products mt-5">
        <h3 class="mb-4">Sản phẩm liên quan</h3>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <x-product-card-vertical :product="$product" />
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

@push('styles')
<style>
    .product-gallery .thumbnail {
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .product-gallery .thumbnail:hover {
        opacity: 0.8;
    }

    .sale-price {
        color: #dc3545;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .original-price {
        font-size: 1.1rem;
        margin-left: 10px;
    }

    .quantity-selector input {
        border-left: 0;
        border-right: 0;
    }
</style>
@endpush

@push('scripts')
<script>
    function incrementQuantity() {
        const input = document.getElementById('quantity');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQuantity() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }

    // Xử lý click thumbnail
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.addEventListener('click', function() {
            const mainImage = document.querySelector('.main-image img');
            mainImage.src = this.src;
        });
    });
</script>
@endpush
@endsection