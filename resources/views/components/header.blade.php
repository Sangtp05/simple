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
                <a href="/categories" class="menu_link">Sản phẩm
                    <div class="menu_sub_wrapper">
                        @foreach ($categories as $category)
                        <a href="{{ route('categories.parent.show', $category->slug) }}" class="">
                            {{ $category->name }}
                        </a>
                        @endforeach
                    </div>
                </a>

                <a href="/about" class="menu_link">Về chúng tôi</a>
                <a href="/contact" class="menu_link">Tin tức</a>
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
                    <div class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-md shadow-xl hidden group-hover:block">
                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Thông tin tài khoản
                        </a>
                        <a href="/orders" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Đơn hàng của tôi
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
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