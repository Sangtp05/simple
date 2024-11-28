@extends('layouts.app')
@section('title', 'Giỏ hàng')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/customer/cart.css') }}">
@endpush
@section('content')
<section class="section section-cart">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div id="cart-content"
                    data-get-url="{{ route('cart.get') }}"
                    data-update-url="{{ route('cart.update') }}"
                    data-token="{{ csrf_token() }}">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cart item template -->
<template id="cart-template">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Ảnh Sản phẩm</th>
                    <th>Thông tin sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody id="cart-items">
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Tổng cộng:</td>
                    <td class="fw-bold cart-total"></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="container">
        <div class="d-flex justify-content-end">
            <a href="{{ route('checkout.index') }}" class="btn btn-primary">Thanh toán</a>
        </div>
    </div>
</template>

<!-- Empty cart template -->
<template id="empty-cart-template">
    <div class="text-center py-5">
        <p class="mb-3">Giỏ hàng của bạn đang trống.</p>

    </div>
</template>
@endsection

@push('scripts')
<script src="{{ asset('js/simple/pages/customer/cart.js') }}"></script>
@endpush