@extends('layouts.app')

@section('title', 'Kết quả tìm kiếm')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/product-card.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/components/product-card.js') }}"></script>
@endpush
@section('content')
<div class="container py-4">
    <h1 class="mb-4">Kết quả tìm kiếm: {{ $query }}</h1>

    @if($products->isEmpty())
    <div class="text-center py-5">
        <h3>Không tìm thấy sản phẩm nào phù hợp</h3>
        <p>Vui lòng thử lại với từ khóa khác</p>
    </div>
    @else
    <div class="row">
        @foreach($products as $product)
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <x-product-card-vertical :product="$product" />
        </div>
        @endforeach
    </div>
    {{ $products->appends(['q' => $query])->links() }}
    @endif
</div>
@endsection