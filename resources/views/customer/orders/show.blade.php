@extends('layouts.app')
@section('title', 'Chi tiết đơn hàng #' . $order->order_number)

@section('content')
<div class="container py-8">
    <div class="mb-6">
        <a href="{{ route('customer.orders') }}" class="text-blue-600 hover:text-blue-900">
            &larr; Quay lại danh sách đơn hàng
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">
                    Đơn hàng #{{ $order->order_number }}
                </h1>
                <span class="px-3 py-1 rounded-full text-sm font-semibold
                    {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : 
                       ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 
                       'bg-yellow-100 text-yellow-800') }}">
                    {{ trans('orders.status.' . $order->status) }}
                </span>
            </div>
            <div class="mt-2 text-sm text-gray-600">
                Đặt ngày: {{ $order->created_at->format('d/m/Y H:i') }}
            </div>
        </div>

        <div class="px-6 py-4">
            <h2 class="text-lg font-semibold mb-4">Thông tin giao hàng</h2>
            <div class="text-gray-600">
                <p>Địa chỉ: {{ $order->shipping_address }}</p>
            </div>
        </div>

        <div class="px-6 py-4">
            <h2 class="text-lg font-semibold mb-4">Chi tiết đơn hàng</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Sản phẩm
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Giá
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Số lượng
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Tổng
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($order->orderItems as $item)
                    <tr>
                        <td class="px-6 py-4">
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
                            <div class="text-sm text-gray-900">
                                {{ $item->quantity }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ number_format($item->price * $item->quantity) }}đ
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6 text-right">
                <div class="text-lg font-bold">
                    Tổng cộng: {{ number_format($order->total_amount) }}đ
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 