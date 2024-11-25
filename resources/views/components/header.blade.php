@php
    $categories = \App\Models\Category::with('children')
        ->whereNull('parent_id')
        ->get();
@endphp

<header class="bg-white shadow-md">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold text-gray-800">
                    Logo
                </a>
            </div>

            <!-- Menu chính -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-gray-600 hover:text-gray-900">Trang chủ</a>
                <a href="/categories" class="text-gray-600 hover:text-gray-900">Sản phẩm</a>
                @foreach ($categories as $category)
                    <a href="{{ route('categories.parent.show', $category->slug) }}" class="text-gray-600 hover:text-gray-900">
                        {{ $category->name }}
                    </a>
                @endforeach
                <a href="/about" class="text-gray-600 hover:text-gray-900">Giới thiệu</a>
                <a href="/contact" class="text-gray-600 hover:text-gray-900">Liên hệ</a>
            </div>

            <!-- Menu phải -->
            <div class="flex items-center space-x-4">
                <!-- Giỏ hàng -->
                <a href="/cart" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="ml-1">Giỏ hàng</span>
                </a>

                <!-- User menu -->
                @if(session('customer'))
                    <div class="relative group">
                        <button class="flex items-center text-gray-600 hover:text-gray-900">
                            <span class="mr-1">{{ session('customer')->name }}</span>
                            <i class="fas fa-chevron-down"></i>
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
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Đăng ký
                    </a>
                @endif
            </div>
        </div>
    </nav>
</header> 