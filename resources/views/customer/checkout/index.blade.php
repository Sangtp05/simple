@extends('layouts.app')
@section('title', 'Thanh toán')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin đặt hàng</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ giao hàng</label>
                            <input type="text" name="shipping_address" class="form-control" required
                                   value="{{ old('shipping_address', auth()->user()->address) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" required
                                   value="{{ old('phone', auth()->user()->phone) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ghi chú</label>
                            <textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Xác nhận đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Đơn hàng của bạn</h3>
                </div>
                <div class="card-body">
                    @foreach($cart as $item)
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                        <span>{{ number_format($item->product->price * $item->quantity) }}đ</span>
                    </div>
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Tổng cộng:</strong>
                        <strong>{{ number_format($cart->sum(function($item) {
                            return $item->quantity * $item->product->price;
                        })) }}đ</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 