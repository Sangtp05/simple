@extends('layouts.app')
@section('title', 'Thông tin cá nhân')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Thông tin cá nhân</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('customer.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" value="{{ $customer->email }}" class="w-full px-3 py-2 border rounded" disabled>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Họ tên</label>
                <input type="text" name="name" value="{{ old('name', $customer->name) }}" 
                       class="w-full px-3 py-2 border rounded">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Số điện thoại</label>
                <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" 
                       class="w-full px-3 py-2 border rounded">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Địa chỉ</label>
                <input type="text" name="address" value="{{ old('address', $customer->address) }}" 
                       class="w-full px-3 py-2 border rounded">
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" 
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Cập nhật thông tin
            </button>
        </form>
    </div>
</div>
@endsection 