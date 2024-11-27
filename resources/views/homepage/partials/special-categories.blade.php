<div class="container">
    <div class="row">
        @foreach($categories as $category)
        <div class="col-lg-6 col-md-6 col-sm-6">
            <a href="{{ route('categories.parent.show', $category->slug) }}" class="text-decoration-none">
                <div class="special-category-item position-relative">
                    <img src="{{ $category->image }}" alt="{{ $category->name }}" class="special-category-item-image">
                    <div class="special-category-item-overlay">
                        <h3 class="special-category-item-title text-light">{{ $category->name }}</h3>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>