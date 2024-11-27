@extends('layouts.app')
@section('title', 'Giỏ hàng')

@section('content')
<div class="container py-8">
    <h1 class="text-2xl font-bold mb-6">Giỏ hàng của bạn</h1>

    @if($cartItems->count() > 0)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Sản phẩm
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Giá
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Số lượng
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tổng
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($cartItems as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" 
                                         src="{{ $item->product->image_url }}" 
                                         alt="{{ $item->product->name }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $item->product->name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ number_format($item->price) }}đ
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="number" 
                                   min="1" 
                                   value="{{ $item->quantity }}" 
                                   class="quantity-input border rounded px-2 py-1 w-20"
                                   data-cart-id="{{ $item->id }}">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ number_format($item->price * $item->quantity) }}đ
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button class="text-red-600 hover:text-red-900 delete-cart-item"
                                    data-cart-id="{{ $item->id }}">
                                Xóa
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="px-6 py-4 bg-gray-50">
                <div class="text-right">
                    <div class="text-lg font-bold">
                        Tổng cộng: {{ number_format($total) }}đ
                    </div>
                    <a href="{{ route('checkout') }}" 
                       class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Tiến hành thanh toán
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-8">
            <p class="text-gray-500 mb-4">Giỏ hàng của bạn đang trống</p>
        </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Thêm vào giỏ hàng (có thể đặt ở trang chi tiết sản phẩm)
    function addToCart(productId, quantity) {
        fetch('{{ route('cart.add') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            // Cập nhật số lượng trong giỏ hàng trên header
            document.querySelector('.cart-count').textContent = data.cart_count;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi thêm vào giỏ hàng');
        });
    }

    // Thêm các xử lý khác như cập nhật số lượng, xóa sản phẩm...
});
</script>
@endpush
@endsection 