@php
$categories = \App\Models\Category::with('children')
->whereNull('parent_id')
->get();
@endphp

<header class="header">
    <nav class="header_nav">
        <div class="container d-flex justify-content-between position-relative">
            <div class="menu_mobile">
                <div class="hamburger-btn">
                    <img src="{{ asset('img/icons/menu-mobile.svg') }}" alt="Menu">
                </div>
                <div class="search-btn">
                    <img src="{{ asset('img/icons/search.svg') }}" alt="Search">
                </div>
            </div>
            <div class="logo">
                <a href="/" class="logo_link">
                    <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="logo_img">
                </a>
            </div>

            <!-- Menu chính -->
            <div class="group_menu">
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

            <div class="header_right d-none d-md-flex">
                <div class="menu_search">
                    <form action="/search" method="GET" class="search_input_wrapper search_input">
                        <input type="text"
                            name="q"
                            class="search_input_field"
                            placeholder="Tìm kiếm sản phẩm"
                            value="{{ request()->get('q') }}">
                        <button type="submit" class="search-btn-action">
                            <img src="{{ asset('img/icons/search.svg') }}" alt="Search">
                        </button>
                    </form>
                </div>

                <div class="group_auth d-flex">
                    @auth('customer')
                    <div class="item_auth">
                        <a href="/cart" class="position-relative">
                            <img src="{{ asset('img/icons/cart.svg') }}" alt="Giỏ hàng">
                            <span id="cart-icon-count"></span>
                        </a>
                    </div>
                    <div class="item_auth">
                        <img src="{{ asset('img/icons/user.svg') }}" alt="User">
                        <div class="item_auth_sub_wrapper">
                            <div class="item_auth_sub_wrapper_inner">
                                <p class="text-light bold name_customer px-4">
                                    Hi, {{ auth('customer')->user()->name }}
                                </p>
                                <a href="{{ route('customer.profile') }}" class="menu_sub_link text-light">
                                    <img src="{{ asset('img/icons/user.svg') }}" class="mr-2" alt="User">
                                    Thông tin tài khoản
                                </a>
                                <a href="/orders" class="menu_sub_link text-light">
                                    <img src="{{ asset('img/icons/order.svg') }}" class="mr-2" alt="Đơn hàng">
                                    Đơn hàng của tôi
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn-none menu_sub_link text-light">
                                        <img src="{{ asset('img/icons/logout.svg') }}" class="mr-2" alt="Đăng xuất">
                                        Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="item_auth_btn">
                        <a href="{{ route('login') }}" class="login_link auth_link">Đăng nhập</a>
                    </div>
                    <div class="item_auth_btn">
                        <a href="{{ route('customer.register') }}" class="register_link auth_link">
                            Đăng ký
                        </a>
                    </div>
                    @endauth
                </div>
            </div>

            <!-- Mobile version -->
            <div class="menu_search d-md-none">
                <form action="/search" method="GET" class="search_input_wrapper search_input">
                    <input type="text"
                        name="q"
                        class="search_input_field"
                        placeholder="Tìm kiếm sản phẩm"
                        value="{{ request()->get('q') }}">
                    <button type="submit" class="search-btn-action">
                        <img src="{{ asset('img/icons/search.svg') }}" alt="Search">
                    </button>
                </form>
            </div>
            <div class="group_auth d-flex d-md-none">
                @auth('customer')
                <div class="item_auth">
                    <a href="/cart" class="position-relative">
                        <img src="{{ asset('img/icons/cart.svg') }}" alt="Giỏ hàng">
                        <span id="cart-icon-count"></span>
                    </a>
                </div>
                <div class="item_auth">
                    <img src="{{ asset('img/icons/user.svg') }}" alt="User">
                    <div class="item_auth_sub_wrapper">
                        <div class="item_auth_sub_wrapper_inner">
                            <p class="text-light bold name_customer px-4">
                                Hi, {{ auth('customer')->user()->name }}
                            </p>
                            <a href="{{ route('customer.profile') }}" class="menu_sub_link text-light">
                                <img src="{{ asset('img/icons/user.svg') }}" class="mr-2" alt="User">
                                Thông tin tài khoản
                            </a>
                            <a href="/orders" class="menu_sub_link text-light">
                                <img src="{{ asset('img/icons/order.svg') }}" class="mr-2" alt="Đơn hàng">
                                Đơn hàng của tôi
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn-none menu_sub_link text-light">
                                    <img src="{{ asset('img/icons/logout.svg') }}" class="mr-2" alt="Đăng xuất">
                                    Đăng xuất
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="item_auth_btn">
                    <a href="{{ route('login') }}" class="login_link auth_link">
                        <span class="auth_link_text">Đăng nhập</span>
                        <img src="{{ asset('img/icons/login.svg') }}" alt="Đăng nhập" class="auth_link_icon">
                    </a>
                </div>
                <div class="item_auth_btn">
                    <a href="{{ route('customer.register') }}" class="register_link auth_link">
                        <span class="auth_link_text">Đăng ký</span>
                        <img src="{{ asset('img/icons/register.svg') }}" alt="Đăng ký" class="auth_link_icon">
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </nav>
</header>