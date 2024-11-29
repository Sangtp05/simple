@extends('layouts.app')
@section('title', $post->name)
@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/post/detail.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/post-card.css') }}">
@endpush
@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <article>
                    @if($post->image)
                    <img class="img-main" src="{{ asset($post->image) }}" alt="{{ $post->name }}"
                        onerror="this.src=`{{ asset('img/pages/post/default.svg') }}`">
                    @endif
                    <h1 class="mb-4">{{ $post->name }}</h1>
                    <div class="text-muted mb-4">
                        <span>{{ $post->created_at->format('d/m/Y') }}</span>
                        <span class="mx-2">|</span>
                        <span>{{ ucfirst($post->type) }}</span>
                    </div>
                    @if($post->description)
                    <div class="lead mb-4">
                        {{ $post->description }}
                    </div>
                    @endif
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Bài Viết Liên Quan</h5>
                    </div>
                    <div class="card-body">
                        @foreach($relatedPosts as $relatedPost)
                        <div class="mb-3">
                            @include('components.post-card-vertical', ['post' => $relatedPost])
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection