<div class="container">
    <h2 class="text-center mb-4">Featured Products</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($featuredProducts as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                </div>
            </div>
        @endforeach
    </div>
</div> 