@extends('layouts.app')
@section('title', 'Trang chủ')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/homepage/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/product-card.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/simple/homepage/index.js') }}"></script>
<script src="{{ asset('js/components/product-card.js') }}"></script>
@endpush
@section('content')
<section class="section_banner">
    @include('homepage.partials.banner')
</section>

<section class="section">
    @include('homepage.partials.featured-products', ['featuredProducts' => $featuredProducts])
</section>

<section class="section">
    @include('homepage.partials.special-categories', ['categories' => $categories])
</section>

<section class="section">
    @include('homepage.partials.image-library', ['productLibraryImages' => $productLibraryImages])
</section>

<section class="section">
    @include('homepage.partials.reviews')
</section>
@endsection