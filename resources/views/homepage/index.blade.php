@extends('layouts.app')
@section('title', 'Trang chủ')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/simple/homepage/index.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/simple/homepage/index.js') }}"></script>
@endpush
@section('content')
    <section class="section">
        @include('homepage.partials.banner')
    </section>

    <section class="section">
        @include('homepage.partials.featured-products', ['featuredProducts' => $featuredProducts])
    </section>

    <section class="section">
        @include('homepage.partials.special-categories')
    </section>

    <section class="section">
        @include('homepage.partials.image-library')
    </section>

    <section class="section">
        @include('homepage.partials.reviews')
    </section>
@endsection 