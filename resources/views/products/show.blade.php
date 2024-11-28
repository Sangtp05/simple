@extends('layouts.app')
@section('title', $product->name)
@push('styles')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="{{ asset('css/components/product-card.css') }}">
<link rel="stylesheet" href="{{ asset('css/simple/pages/product/detail.css') }}">
@endpush
@push('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    const url_update_cart = "{{ route('cart.update') }}";
    const csrf_token = "{{ csrf_token() }}";
</script>
<script src="{{ asset('js/components/product-card.js') }}"></script>
<script src="{{ asset('js/simple/pages/product/detail.js') }}"></script>
@endpush
@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-gallery">
                    <div class="gallery-main">
                        @if($product->images->count() > 0)
                        @foreach($product->images as $image)
                        <div class="gallery-item">
                            <img src="{{ $image->url }}" class="img-fluid main-image" alt="{{ $product->name }}"
                                onerror="this.src = `{{ asset('img/pages/product/default.jpg') }}`">
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h1 class="product-title mb-3">{{ $product->name }}</h1>

                <div class="product-price mb-4">
                    @if($product->sale_price)
                    <span class="sale-price">{{ number_format($product->sale_price) }}đ</span>
                    <span class="original-price text-muted">
                        {{ number_format($product->price) }}đ
                    </span>
                    @else
                    <span class="price">{{ number_format($product->price) }}đ</span>
                    @endif
                </div>

                <div class="product-description mb-4">
                    {!! $product->description !!}
                </div>

                <div class="additional-info mb-4">
                    <p><strong>Mã sản phẩm:</strong> {{ $product->sku }}</p>
                    <p><strong>Danh mục:</strong> <a href="{{ route('categories.child.show', [
                        'categoryParent' => $product->category->parent->slug,
                        'categoryChild' => $product->category->slug
                    ]) }}" class="text-dark">{{ $product->category->name }}</a></p>
                </div>

                <div class="product-actions mb-4">
                    <div class="quantity-control mb-4">
                        <div class="cart-input-group">
                            <button type="button" class="button-cart button-cart-minus decrease-quantity">
                                <img src="{{ asset('img/icons/minus.svg') }}" alt="Giảm số lượng">
                            </button>

                            <input type="number" class="input-quantity" value="1" min="1">

                            <button type="button" class="button-cart button-cart-plus increase-quantity">
                                <img src="{{ asset('img/icons/plus.svg') }}" alt="Tăng số lượng">
                            </button>
                        </div>
                    </div>
                    @auth('customer')
                    <button class="btn btn-primary add-to-cart-detail"
                        data-product-id="{{ $product->id }}">
                        Thêm vào giỏ hàng
                    </button>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary add-to-cart-login">Đăng nhập để mua hàng</a>
                    @endauth
                </div>

                <div class="detail-product-policy">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="policy-item">
                                <img src="{{ asset('img/icons/policy1.svg') }}" alt="Chính sách đổi trả">
                                <p>Chính sách ưu đãi</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="policy-item">
                                <img src="{{ asset('img/icons/policy2.svg') }}" alt="Chính sách đổi trả">
                                <p>60 ngày đổi trả</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="policy-item">
                                <img src="{{ asset('img/icons/policy3.svg') }}" alt="Chính sách đổi trả">
                                <p>Giao hàng miễn phí</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="policy-item">
                                <img src="{{ asset('img/icons/policy4.svg') }}" alt="Chính sách đổi trả">
                                <p>Chăm sóc 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2 class="mb-4 text-center">Mô tả sản phẩm</h2>
        <div class="product-content">
            {!! $product->content !!}
        </div>
    </div>
</section>

<section class="section">
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
</section>
@endsection