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
                @auth('customer')
                <div class="item_auth">
                    <a href="/cart" class="">
                        <img src="{{ asset('img/icons/cart.svg') }}" alt="Giỏ hàng">
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
    </nav>
</header>