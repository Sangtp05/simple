@extends('layouts.app')
@section('title', 'Trang chủ')
@push('styles')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="{{ asset('css/simple/pages/homepage/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/product-card.css') }}">
@endpush
@push('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('js/components/product-card.js') }}"></script>
<script src="{{ asset('js/simple/pages/homepage/homepage.js') }}"></script>
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
@endsection