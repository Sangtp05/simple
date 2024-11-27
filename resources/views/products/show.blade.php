@extends('layouts.app')

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('categories.parent.show', $product->category->parent->slug) }}">
                    {{ $product->category->parent->name }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('categories.child.show', [$product->category->parent->slug, $product->category->slug]) }}">
                    {{ $product->category->name }}
                </a>
            </li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Hình ảnh sản phẩm -->
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

    <!-- Chi tiết sản phẩm -->
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

    <!-- Sản phẩm liên quan -->
    @if($relatedProducts->count() > 0)
    <div class="related-products mt-5">
        <h3 class="mb-4">Sản phẩm liên quan</h3>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ $relatedProduct->image }}" class="card-img-top" alt="{{ $relatedProduct->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                        <p class="card-text">{{ number_format($relatedProduct->price) }}đ</p>
                        <a href="{{ route('products.show', [
                            'categoryParent' => $relatedProduct->category->parent->slug,
                            'categoryChild' => $relatedProduct->category->slug,
                            'slug' => $relatedProduct->slug
                        ]) }}"
                            class="btn btn-outline-primary">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
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