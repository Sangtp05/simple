@extends('layouts.app')
@section('title', 'Chi tiết đơn hàng #' . $order->id)

@section('content')
<div class="container py-5">
    <div class="card mb-4">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">
                    Đơn hàng #{{ $order->id }}
                </h1>
                <span class="badge rounded-pill 
                    {{ $order->status === 'completed' ? 'bg-success' : 
                       ($order->status === 'cancelled' ? 'bg-danger' : 
                       'bg-warning') }}">
                    {{ trans('orders.status.' . $order->status) }}
                </span>
            </div>
            <div class="text-muted small mt-2">
                Đặt ngày: {{ $order->created_at->format('d/m/Y H:i') }}
            </div>
        </div>

        <div class="card-body">
            <h2 class="h5 mb-3">Thông tin giao hàng</h2>
            <p class="text-muted mb-4">
                Địa chỉ: {{ $order->shipping_address }}
            </p>

            <h2 class="h5 mb-3">Chi tiết đơn hàng</h2>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col" class="text-end">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $item->product->image_url }}" 
                                         alt="{{ $item->product->name }}"
                                         class="rounded me-3"
                                         style="width: 48px; height: 48px; object-fit: cover;"
                                         onerror="this.src = `{{ asset('img/pages/product/default.jpg') }}`">
                                    <div>
                                        <h6 class="mb-0">{{ $item->product->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ number_format($item->price) }}đ</td>
                            <td>{{ $item->quantity }}</td>
                            <td class="text-end">{{ number_format($item->price * $item->quantity) }}đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-4">
                <h5 class="mb-0">
                    Tổng cộng: {{ number_format($order->total_amount) }}đ
                </h5>
            </div>
        </div>
    </div>
</div>
@endsection 