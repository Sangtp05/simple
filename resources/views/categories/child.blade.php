@extends('layouts.app')
@section('title', $categoryChild->name)
@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/category/child.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/product-card.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/components/product-card.js') }}"></script>
@endpush

@section('content')
<section class="category-child-section">
    <div class="text-decoration-none category-child-wrapper">
        <img class="category-child-image" src="{{ Storage::url($categoryChild->image) }}"
            alt="{{ $categoryChild->name }}">
        <div class="category-child-content">
            <h3 class="category-child-name">{{ $categoryChild->name }}</h3>
            <p class="category-child-description">{{ $categoryChild->description }}</p>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <x-product-card-vertical :product="$product" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection