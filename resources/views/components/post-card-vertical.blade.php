<div class="card h-100 post-card" onclick="window.location=`{{ route('posts.show', $post->slug) }}`">
    <div class="position-relative">
        <img src="{{ Storage::url($post->image) }}"
            alt="{{ $post->name }}"
            onerror="this.src=`{{ asset('img/pages/post/default.svg') }}`">
    </div>
    <div class="card-body">
        <div class="text-muted small mb-2">
            {{ $post->created_at->format('d/m/Y') }}
        </div>
        <h5 class="card-title">{{ $post->name }}</h5>
        <p class="card-text description-2-lines">
            {{ $post->description }}
        </p>
    </div>
</div>