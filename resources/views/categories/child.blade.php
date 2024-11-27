@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $categoryChild }}</h1>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if($product->image)
                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->short_description }}</p>
                    <p class="card-text">
                        <strong>Giá: </strong>{{ number_format($product->price) }} VNĐ
                    </p>
                    <a href="{{ route('products.show', [
                        'categoryParent' => $product->category->parent->slug,
                        'categoryChild' => $product->category->slug,
                        'slug' => $product->slug
                    ]) }}"
                        class="btn btn-primary">
                        Xem chi tiết
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection