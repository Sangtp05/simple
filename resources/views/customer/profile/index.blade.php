@extends('layouts.app')
@section('title', 'Thông tin tài khoản')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ asset('images/default-avatar.jpg') }}" 
                             class="rounded-circle img-thumbnail" 
                             style="width: 100px; height: 100px; object-fit: cover;"
                             alt="Avatar">
                    </div>
                    <h5 class="card-title mb-0">{{ auth()->guard('customer')->user()->name }}</h5>
                    <p class="text-muted small">Thành viên từ: {{ auth()->guard('customer')->user()->created_at->format('d/m/Y') }}</p>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('customer.profile') }}" 
                       class="list-group-item list-group-item-action {{ request()->routeIs('customer.profile') ? 'active' : '' }}">
                        <i class="bi bi-person me-2"></i> Thông tin cá nhân
                    </a>
                    <a href="{{ route('customer.orders') }}" 
                       class="list-group-item list-group-item-action {{ request()->routeIs('customer.orders') ? 'active' : '' }}">
                        <i class="bi bi-bag me-2"></i> Đơn hàng của tôi
                    </a>
                    <a href="{{ route('customer.cart') }}" 
                       class="list-group-item list-group-item-action {{ request()->routeIs('customer.cart') ? 'active' : '' }}">
                        <i class="bi bi-cart me-2"></i> Giỏ hàng
                        <span class="badge bg-primary float-end">{{ $cartCount ?? 0 }}</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Thông tin cá nhân</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('customer.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       name="name" 
                                       value="{{ old('name', $customer->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" 
                                       class="form-control" 
                                       value="{{ $customer->email }}" 
                                       readonly>
                                <small class="text-muted">Email không thể thay đổi</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       name="phone" 
                                       value="{{ old('phone', $customer->phone) }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" 
                                          name="address" 
                                          rows="3">{{ old('address', $customer->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Cập nhật thông tin
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 