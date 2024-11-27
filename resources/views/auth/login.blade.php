@extends('layouts.app')
@section('title', 'Đăng nhập')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/auth/auth.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/simple/auth/auth.js') }}"></script>
@endpush

@section('content')
<section class="section section-auth">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 col-lg-6 col-12">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h2 class="card-title text-light text-center mb-4 fw-bold">Đăng nhập</h2>
                        
                        @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if (session('success'))
                        <div class="alert alert-success mb-4">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
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

                            <div class="mb-4">
                                <label class="form-label fw-semibold text-light" for="password">
                                    Mật khẩu
                                </label>
                                <input class="form-control" 
                                    id="password" 
                                    type="password" 
                                    name="password" 
                                    required>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-outline-light fw-semibold" 
                                    type="submit">
                                    Đăng nhập
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ route('register') }}" class="text-decoration-none text-light">
                                    Chưa có tài khoản? Đăng ký ngay
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