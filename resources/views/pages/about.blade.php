@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/about/about.css') }}">
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="mb-4">Về Chúng Tôi</h1>
                <p class="lead mb-4">Simple - Thương hiệu thời trang thiết kế cho phái nam</p>
                <p class="lead mb-4">Đơn giản - Tinh tế - Cá tính</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('img/pages/about/default.svg') }}" alt="About Us" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Story Section -->
<section class="story-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h2 class="section-title text-light">Câu Chuyện Của Chúng Tôi</h2>
                <p class="mb-4 text-light">
                    Simple được thành lập vào năm 2020, với mong muốn mang đến những thiết kế thời trang đơn giản,
                    tinh tế nhưng vẫn đầy cá tính cho phái mạnh. Chúng tôi tin rằng, vẻ đẹp thực sự đến từ sự đơn giản.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Giá Trị Cốt Lõi</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="value-card">
                    <div class="value-icon mb-3">
                        <img src="{{ asset('img/pages/about/quality.svg') }}" alt="Quality">
                    </div>
                    <h3>Chất Lượng</h3>
                    <p>Cam kết sử dụng chất liệu cao cấp và quy trình sản xuất nghiêm ngặt</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card">
                    <div class="value-icon mb-3">
                        <img src="{{ asset('img/pages/about/design.svg') }}" alt="Design">
                    </div>
                    <h3>Thiết Kế</h3>
                    <p>Sáng tạo những mẫu thiết kế độc đáo, phù hợp với xu hướng</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card">
                    <div class="value-icon mb-3">
                        <img src="{{ asset('img/pages/about/service.svg') }}" alt="Service">
                    </div>
                    <h3>Dịch Vụ</h3>
                    <p>Đặt trải nghiệm khách hàng lên hàng đầu với dịch vụ tận tâm</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="section-title text-light">Liên Hệ</h2>
                <div class="contact-info">
                    <p class="text-light"><strong>Địa chỉ:</strong> Đà Nẵng</p>
                    <p class="text-light"><strong>Email:</strong> info@simple.com</p>
                    <p class="text-light"><strong>Điện thoại:</strong> 0909090909</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.0399187552644!2d108.2806575749946!3d16.060168084632824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142177f2ced6d8b%3A0xeac35f2960ca74a4!2zRlBUIENvbXBsZXggxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1710146726492!5m2!1svi!2s"
                        width="100%"
                        height="300"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection