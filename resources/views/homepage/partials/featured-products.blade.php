<div class="container">
    <h2 class="text-center bold mb-4">Sản phẩm nổi bật</h2>
    <div class="row">
        @foreach($featuredProducts as $product)
        <div class="col-lg-3 col-md-4 col-6 mb-4">
            <x-product-card-vertical :product="$product" />
        </div>
        @endforeach
    </div>
</div>