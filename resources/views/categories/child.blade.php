@extends('layouts.app')
@section('title', $categoryChild->name)
@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/category/child.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/product-card.css') }}">
@endpush
@push('scripts')
<script>
    const isAuthenticated = "{{ auth('customer')->check() ? 'true' : 'false' }}";
    const categoryId = "{{ $categoryChild->id }}";
</script>
<script src="{{ asset('js/simple/pages/category/child.js') }}"></script>
@endpush
@section('content')
<section class="category-child-section">
    <div class="text-decoration-none category-child-wrapper">
        <img class="category-child-image" src="{{ Storage::url($categoryChild->image) }}"
            alt="{{ $categoryChild->name }}"
            onerror="this.src = `{{ asset('img/pages/banner/default.jpg') }}`">
        <div class="category-child-content">
            <h3 class="category-child-name">{{ $categoryChild->name }}</h3>
            <p class="category-child-description">{{ $categoryChild->description }}</p>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Bộ lọc</h5>
                            
                            <div class="mb-4">
                                <h6 class="mb-2">Kích thước</h6>
                                <div class="size-filters">
                                    <!-- Size filters will be loaded here -->
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6 class="mb-2">Màu sắc</h6>
                                <div class="color-filters">
                                    <!-- Color filters will be loaded here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row product-list">
                        <!-- Products will be loaded here -->
                    </div>
                    <div class="text-center loading-spinner d-none">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
