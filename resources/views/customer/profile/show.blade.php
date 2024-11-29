@extends('layouts.app')
@section('title', 'Thông tin cá nhân')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/customer/profile.css') }}">
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card profile-card">
                <div class="card-header">
                    <h2 class="card-title">Thông tin cá nhân</h2>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('customer.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label">Email</label>
                            <input type="email" value="{{ $customer->email }}" 
                                   class="form-control" disabled>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Họ tên</label>
                            <input type="text" name="name" 
                                   value="{{ old('name', $customer->name) }}" 
                                   class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" 
                                   value="{{ old('phone', $customer->phone) }}" 
                                   class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" name="address" 
                                   value="{{ old('address', $customer->address) }}" 
                                   class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Mật khẩu mới</label>
                            <input type="password" name="password" 
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" name="password_confirmation" 
                                   class="form-control">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Cập nhật thông tin
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('cart.show') }}" class="btn btn-outline-primary d-block">
                                <i class="bi bi-cart"></i> Giỏ hàng của tôi
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('customer.orders') }}" class="btn btn-outline-primary d-block">
                                <i class="bi bi-box"></i> Đơn hàng của tôi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection