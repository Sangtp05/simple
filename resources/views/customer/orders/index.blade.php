@extends('layouts.app')
@section('title', 'Đơn hàng của tôi')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/components/product-card.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/components/product-card.js') }}"></script>
@endpush
@section('content')
<div class="container py-5">
    <h1 class="h2 mb-4">Đơn hàng của tôi</h1>

    @if($orders->count() > 0)
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>
                                <span class="fw-medium">#{{ $order->id }}</span>
                            </td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($order->total_amount) }}đ</td>
                            <td>
                                <span class="badge rounded-pill 
                                        {{ $order->status === 'completed' ? 'bg-success' : 
                                           ($order->status === 'cancelled' ? 'bg-danger' : 
                                           'bg-warning') }}">
                                    {{ trans('orders.status.' . $order->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('customer.orders.show', $order) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    Chi tiết
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
    @else
    <div class="text-center py-5">
        <div class="mb-4 d-flex justify-content-center" >
            <img src="{{ asset('img/pages/customer/order.svg') }}"
                alt="Không có đơn hàng"
                class="img-fluid"
                style="max-width: 200px;">
        </div>
        <p class="text-muted">Bạn chưa có đơn hàng nào</p>
        <a href="{{ route('homepage.index') }}" class="btn btn-primary mt-3">
            Mua sắm ngay
        </a>
    </div>
    @endif
</div>

<section class="section">
    @include('homepage.partials.featured-products', ['featuredProducts' => $featuredProducts])
</section>
@endsection