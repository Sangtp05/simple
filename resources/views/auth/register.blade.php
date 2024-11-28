@extends('layouts.app')
@section('title', 'Đăng ký')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/auth/auth.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/simple/auth/auth.js') }}"></script>
@endpush

@section('content')
<section class="py-5 d-flex align-items-center section-auth">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 col-lg-6 col-12">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h2 class="card-title text-light text-center mb-4 fw-bold">Đăng ký tài khoản</h2>

                        @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('customer.register') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-light" for="name">
                                    Họ và tên
                                </label>
                                <input class="form-control" 
                                    id="name" 
                                    type="text" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-light" for="email">
                                    Email
                                </label>
                                <input class="form-control" 
                                    id="email" 
                                    type="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-light" for="password">
                                    Mật khẩu
                                </label>
                                <input class="form-control" 
                                    id="password" 
                                    type="password" 
                                    name="password" 
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-light" for="password_confirmation">
                                    Xác nhận mật khẩu
                                </label>
                                <input class="form-control" 
                                    id="password_confirmation" 
                                    type="password" 
                                    name="password_confirmation" 
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-light" for="phone">
                                    Số điện thoại
                                </label>
                                <input class="form-control" 
                                    id="phone" 
                                    type="text" 
                                    name="phone" 
                                    value="{{ old('phone') }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold text-light" for="address">
                                    Địa chỉ
                                </label>
                                <textarea class="form-control" 
                                    id="address" 
                                    name="address" 
                                    required>{{ old('address') }}</textarea>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button class="btn btn-outline-light fw-semibold" 
                                    type="submit">
                                    Đăng ký
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}" class="text-decoration-none text-light">
                                    Đã có tài khoản? Đăng nhập ngay
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection