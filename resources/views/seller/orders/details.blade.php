@extends('seller.Layout.layout')
@section('main-content')
    <h1>Order Details</h1>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Customer Name:</strong> {{ $order->full_name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Phone Number:</strong> {{ $order->phone_number }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>

    <h3>Order Items</h3>
    <ul>
        @foreach($order->order_items as $item)
            <li>
                <strong>Product:</strong> {{ $item['product_name'] }}<br>
                <strong>Quantity:</strong> {{ $item['quantity'] }}<br>
                <strong>Price:</strong> ${{ $item['price'] }}<br>
            </li>
        @endforeach
    </ul>

    <h3>Payment Details</h3>
    <pre>{{ json_encode($order->payment_details, JSON_PRETTY_PRINT) }}</pre>
@endsection
