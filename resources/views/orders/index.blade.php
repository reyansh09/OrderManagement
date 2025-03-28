@extends('layouts.app')

@section('content')
    <div class="card p-3">
        <h4>Order Details</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Order ID</th>
                    <th>Buyer Details</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->created_at }}</td>
                        <td><a href="#">{{ $order->order_id }}</a></td>
                        <td>
                            <strong>{{ $order->buyer_name }}</strong><br>
                            {{ $order->email }}<br>
                            Phone: {{ $order->phone }}<br>
                            Address: {{ $order->address }}
                        </td>
                        <td>₹{{ $order->total_price }}</td>
                        <td>
                            <button class="btn btn-secondary">Track</button>
                            <a href="{{ url('/orders/invoice/'.$order->id) }}" class="btn btn-link">Generate Invoice</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
