@php
$categories = \App\Models\Category::with('children')
->whereNull('parent_id')
->get();
@endphp

<header class="header">
    <nav class="header_nav">
        <div class="container d-flex justify-content-between">
            <div class="logo">
                <a href="/" class="logo_link">
                    <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="logo_img">
                </a>
            </div>

            <!-- Menu chính -->
            <div class="group_menu d-flex">
                <div class="menu_link text-light">
                    Danh mục sản phẩm
                    <div class="menu_sub_wrapper">
                        <div class="menu_sub_wrapper_inner">
                            @foreach ($categories as $category)
                            <a href="{{ route('categories.parent.show', $category->slug) }}" class="menu_sub_link text-light">
                                {{ $category->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <a href="/about" class="menu_link text-light">Về chúng tôi</a>
                <a href="/posts" class="menu_link text-light">Tin tức</a>
            </div>

            <div class="group_auth d-flex">
                @if(session('customer'))
                <a href="/cart" class="">
                    <img src="{{ asset('img/icons/cart.svg') }}" alt="Giỏ hàng">
                    <span class="">Giỏ hàng</span>
                </a>
                <div class="">
                    <button class="">
                        <span class="mr-1">{{ session('customer')->name }}</span>
                        <img src="{{ asset('img/icons/user.svg') }}" alt="User">
                    </button>
                    <div class="">
                        <a href="/profile" class="">
                            Thông tin tài khoản
                        </a>
                        <a href="/orders" class="">
                            Đơn hàng của tôi
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="">
                                Đăng xuất
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="login_link auth_link">Đăng nhập</a>
                <a href="{{ route('register') }}" class="register_link auth_link">
                    Đăng ký
                </a>
                @endif
            </div>
        </div>
    </nav>
</header>