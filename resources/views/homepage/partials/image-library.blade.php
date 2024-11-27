<div class="container">
    <h2 class="text-center mb-4">Image Library</h2>
    <div class="row">
        @foreach($productLibraryImages as $image)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <img src="{{ Storage::url($image->image) }}" alt="{{ $image->content }}" class="img-fluid">
        </div>
        @endforeach
    </div>
</div>