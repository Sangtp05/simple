@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/simple/pages/policy/policy.css') }}">
@endpush

@section('content')
<div class="policy-page">
    <!-- Header -->
    <section class="policy-header">
        <div class="container">
            <h1 class="text-center">Chính Sách & Điều Khoản</h1>
        </div>
    </section>

    <!-- Main Content -->
    <section class="policy-content">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="policy-nav sticky-top">
                        <div class="nav flex-column nav-pills" role="tablist">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#general">
                                Điều khoản chung
                            </button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#privacy">
                                Chính sách bảo mật
                            </button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#shipping">
                                Chính sách vận chuyển
                            </button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#return">
                                Chính sách đổi trả
                            </button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#warranty">
                                Chính sách bảo hành
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-9">
                    <div class="tab-content policy-tab-content">
                        <!-- Điều khoản chung -->
                        <div class="tab-pane fade show active" id="general">
                            <h2>Điều Khoản Chung</h2>
                            <p class="lead">Cảm ơn bạn đã truy cập website của Simple.</p>
                            
                            <h3>1. Giới thiệu</h3>
                            <p>Khi truy cập website của chúng tôi, bạn đồng ý với các điều khoản này. Vui lòng đọc kỹ.</p>

                            <h3>2. Tài khoản người dùng</h3>
                            <p>Khi tạo tài khoản với chúng tôi, bạn phải cung cấp thông tin chính xác, đầy đủ và cập nhật.</p>

                            <h3>3. Quyền sở hữu trí tuệ</h3>
                            <p>Tất cả nội dung trên website thuộc quyền sở hữu của Simple.</p>
                        </div>

                        <!-- Chính sách bảo mật -->
                        <div class="tab-pane fade" id="privacy">
                            <h2>Chính Sách Bảo Mật</h2>
                            
                            <h3>1. Thu thập thông tin</h3>
                            <p>Chúng tôi thu thập các thông tin khi bạn:</p>
                            <ul>
                                <li>Đăng ký tài khoản</li>
                                <li>Đặt hàng trên website</li>
                                <li>Liên hệ với chúng tôi</li>
                            </ul>

                            <h3>2. Bảo vệ thông tin</h3>
                            <p>Chúng tôi cam kết bảo vệ thông tin cá nhân của bạn.</p>
                        </div>

                        <!-- Chính sách vận chuyển -->
                        <div class="tab-pane fade" id="shipping">
                            <h2>Chính Sách Vận Chuyển</h2>
                            
                            <h3>1. Phí vận chuyển</h3>
                            <p>Phí vận chuyển được tính dựa trên:</p>
                            <ul>
                                <li>Khoảng cách vận chuyển</li>
                                <li>Khối lượng đơn hàng</li>
                                <li>Phương thức vận chuyển</li>
                            </ul>

                            <h3>2. Thời gian giao hàng</h3>
                            <p>Thời gian giao hàng dự kiến từ 2-5 ngày làm việc.</p>
                        </div>

                        <!-- Chính sách đổi trả -->
                        <div class="tab-pane fade" id="return">
                            <h2>Chính Sách Đổi Trả</h2>
                            
                            <h3>1. Điều kiện đổi trả</h3>
                            <p>Sản phẩm được đổi trả trong vòng 7 ngày kể từ ngày nhận hàng khi:</p>
                            <ul>
                                <li>Sản phẩm còn nguyên tem, mác</li>
                                <li>Sản phẩm chưa qua sử dụng</li>
                                <li>Có hóa đơn mua hàng</li>
                            </ul>
                        </div>

                        <!-- Chính sách bảo hành -->
                        <div class="tab-pane fade" id="warranty">
                            <h2>Chính Sách Bảo Hành</h2>
                            
                            <h3>1. Thời gian bảo hành</h3>
                            <p>Thời gian bảo hành tùy thuộc vào từng loại sản phẩm.</p>

                            <h3>2. Điều kiện bảo hành</h3>
                            <p>Sản phẩm được bảo hành miễn phí nếu:</p>
                            <ul>
                                <li>Còn trong thời hạn bảo hành</li>
                                <li>Lỗi do nhà sản xuất</li>
                                <li>Sử dụng đúng hướng dẫn</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection 