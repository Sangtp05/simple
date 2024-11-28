@extends('layouts.app')
@section('title', $categoryParent->name)
@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/category/parent.css') }}">
@endpush
@section('content')
<div class="category-image-wrapper">
    <img class="category-image" src="{{ Storage::url($categoryParent->image) }}" alt="{{ $categoryParent->name }}">
    <h1 class="category-name">{{ $categoryParent->name }}</h1>
</div>
<div class="group-child">
    @foreach($categoryParent->children as $child)
    <a href="{{ route('categories.child.show', [$categoryParent->slug, $child->slug]) }}"
        class="text-decoration-none category-child-wrapper">
        <img class="category-child-image" src="{{ Storage::url($child->image) }}"
            alt="{{ $child->name }}"
            onerror="this.src = `{{ asset('img/pages/banner/default.jpg') }}`">
        <div class="category-child-content">
            <h3 class="category-child-name">{{ $child->name }}</h3>
            <p class="category-child-description">{{ $child->description }}</p>
        </div>
    </a>
    @endforeach
</div>
@endsection