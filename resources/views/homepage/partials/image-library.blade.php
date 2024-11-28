<div class="container">
    <h2 class="text-center mb-4">Image Library</h2>
    <div class="image-slider row">
        @foreach($productLibraryImages as $image)
        <div class="slider-item">
            <img src="{{ Storage::url($image->image) }}" alt="{{ $image->content }}" class="img-fluid">
        </div>
        @endforeach
    </div>
</div>