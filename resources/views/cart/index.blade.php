@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Giỏ hàng</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cartItems) > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach($cartItems as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" 
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                    <span class="ms-2">{{ $details['name'] }}</span>
                                </div>
                            </td>
                            <td>{{ number_format($details['price']) }}đ</td>
                            <td>
                                <input type="number" value="{{ $details['quantity'] }}" 
                                       class="form-control quantity update-cart" style="width: 80px" min="1">
                            </td>
                            <td>{{ number_format($details['price'] * $details['quantity']) }}đ</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td><strong>{{ number_format($total) }}đ</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ url('/') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Tiếp tục mua hàng
            </a>
            <a href="#" class="btn btn-primary">
                Thanh toán <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    @else
        <div class="text-center py-5">
            <h3>Giỏ hàng trống</h3>
            <a href="{{ url('/') }}" class="btn btn-primary mt-3">
                <i class="fas fa-arrow-left"></i> Tiếp tục mua hàng
            </a>
        </div>
    @endif
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $(".update-cart").change(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    quantity: ele.val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    });
</script>
@endpush
@endsection 