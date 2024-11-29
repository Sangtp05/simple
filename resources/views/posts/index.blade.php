@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/post/post.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/post-card.css') }}">
@endpush
@section('content')
<!-- Latest Posts Section -->
<section class="section">
    <div class="container">
        <h2 class="mb-4 bold text-uppercase">Tin Mới Nhất</h2>
        <div class="row">
            @foreach($latestPosts as $post)
            <div class="col-md-4 mb-4">
                @include('components.post-card-vertical', ['post' => $post])
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Simple Section -->
<section class="section">
    <div class="container">
        <h2 class="mb-4 bold text-uppercase">SIMLE</h2>
        <div class="row">
            @foreach($simplePosts as $post)
            <div class="col-md-4 col-12 mb-4">
                @include('components.post-card-vertical', ['post' => $post])
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $simplePosts->links() }}
        </div>
    </div>
</section>
<!-- Fashion Section -->
<section class="section">
    <div class="container">
        <h2 class="mb-4 bold text-uppercase">FASHION</h2>
        <div class="row">
            @foreach($fashionPosts as $post)
            <div class="col-md-4 col-12 mb-4">
                @include('components.post-card-vertical', ['post' => $post])
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $fashionPosts->links() }}
        </div>
    </div>
</section>
<!-- News Section -->
<section class="section">
    <div class="container">
        <h2 class="mb-4 bold text-uppercase">Tin Tức</h2>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-4 col-12 mb-4">
                @include('components.post-card-vertical', ['post' => $post])
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</section>



@endsection