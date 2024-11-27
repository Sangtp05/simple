@php
$categories = \App\Models\Category::with('children')
->whereNull('parent_id')
->get();
@endphp
<footer class="footer">
    <div class="container mb-4">
        <div class="row">
            <div class="col-12 col-md-12 mb-4">
                <div class="footer_logo_wrapper">
                    <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="footer_logo">
                    <p class="title text-light">
                        Khám phá phong cách của bạn cùng chúng tôi!
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <h3 class="subtitle text-light bold">Liên hệ</h3>
                <ul class="footer_link">
                    <li class="d-flex">
                        <p class="me-2 text-light">Email: </p><a href="mailto:info@simple.com" class="text-light">info@simple.com</a>
                    </li>
                    <li class="d-flex">
                        <p class="me-2 text-light">SĐT: </p><a href="tel:+8490909090" class="text-light">+84 909 090 909</a>
                    </li>
                    <li class="d-flex">
                        <p class="me-2 text-light">Địa chỉ: </p><a href="" class="text-light">Đà Nẵng</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-4">
                <h3 class="subtitle text-light bold">Liên kết nhanh</h3>
                <ul class="footer_link">
                    <li><a href="/about" class="text-light">Về chúng tôi</a></li>
                    <li><a href="/products" class="text-light">Sản phẩm</a></li>
                    <li><a href="/posts" class="text-light">Tin tức</a></li>
                    <li><a href="/policy" class="text-light">Chính sách</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-4">
                <h3 class="subtitle text-light bold">Danh mục sản phẩm</h3>
                <ul class="footer_link">
                    @foreach ($categories as $category)
                    <li><a href="/categories/{{ $category->slug }}" class="text-light">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <div class="footer_copyright">
        <p>SIMPLE@2024</p>
    </div>
</footer>