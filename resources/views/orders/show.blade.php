@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Order Details</h2>
    <div>
        <strong>Order ID:</strong> {{ $order->order_id }}<br>
        <strong>Buyer:</strong> {{ $order->buyer_name }}<br>
        <strong>Email:</strong> {{ $order->email }}<br>
        <strong>Phone:</strong> {{ $order->phone }}<br>
        <strong>Address:</strong> {{ $order->address }}<br>
        <strong>Total Price:</strong> ₹{{ number_format($order->total_price, 2) }}<br>
        <strong>Status:</strong> {{ ucfirst($order->status) }}<br>
    </div>
    
    <h3>Products</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>₹{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/orders') }}" class="btn btn-secondary">Back to Orders</a>
</div>
@endsection
