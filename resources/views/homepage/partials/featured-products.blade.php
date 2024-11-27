<div class="container">
    <h2 class="text-center bold mb-4">Featured Products</h2>
    <div class="row">
        @foreach($featuredProducts as $product)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <x-product-card-vertical :product="$product" />
        </div>
        @endforeach
    </div>
</div>