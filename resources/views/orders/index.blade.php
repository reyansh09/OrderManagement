@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Orders List</h2>

    <!-- Search Form -->
    <form action="{{ url('/orders') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search by Order ID, Name, or Email">
        <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Buyer</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->buyer_name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>₹{{ number_format($order->total_price, 2) }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td><a href="{{ url('/orders/'.$order->id) }}" class="btn btn-primary">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
