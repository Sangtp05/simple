<!-- Hiển thị danh sách đơn hàng -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                <td>{{ number_format($order->total_amount) }}đ</td>
                <td>
                    <span class="badge bg-{{ $order->status_color }}">
                        {{ $order->status_text }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('customer.orders.show', $order->id) }}" 
                       class="btn btn-sm btn-outline-primary">
                        Chi tiết
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> 