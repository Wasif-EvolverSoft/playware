@extends('seller.Layout.layout')
@section('main-content')
<br>
<br>
<br>
<br>
<br>
<meta name="csrf-token" content="{{ csrf_token() }}">

@foreach($orders as $order)
    <div class="order-card">
        <!-- Order Left Section: Product Details -->
        <div class="order-card-left">
            {{-- <img src="{{ asset('path_to_image.jpg') }}" alt="Product Image" class="product-image"> --}}
            <div class="product-info">
                <p class="product-name">Product Name</p>
                @foreach ($order->order_items as $item)
                    <div class="product-item">
                        <p class="product-name">{{ $item['name'] ?? 'N/A' }}</p>
                        <p class="product-quantity">Quantity: {{ $item['quantity'] ?? 'N/A' }}</p>
                        <p class="product-total">Total: ${{ number_format($item['total'], 2) ?? 'N/A' }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Order Middle Section: Payment Information -->
        <div class="order-card-middle">
            <div class="payment-info">
                <p><strong>Payment Status:</strong> {{ $order->paymentCheck }}</p>
                <p><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
            </div>
        </div>

        <!-- Order Right Section: Order Status & Actions -->
        <div class="order-card-right">
            <div class="status-actions">
                <p><strong>Status:</strong> <span id="order-status-{{ $order->id }}">{{ ucfirst($order->status) }}</span></p>
                <div class="status-buttons">
                    @if($order->status == 'pending')
                        <button class="btn btn-primary update-status" data-order-id="{{ $order->id }}" data-status="sent">Mark as Sent</button>
                        <button class="btn btn-success update-status" data-order-id="{{ $order->id }}" data-status="delivered">Mark as Delivered</button>
                        <button class="btn btn-complete update-status" data-order-id="{{ $order->id }}" data-status="complete">Mark as Complete</button>
                    @elseif($order->status == 'sent')
                        <button class="btn btn-success update-status" data-order-id="{{ $order->id }}" data-status="delivered">Mark as Delivered</button>
                        <button class="btn btn-complete update-status" data-order-id="{{ $order->id }}" data-status="complete">Mark as Complete</button>
                    @elseif($order->status == 'delivered')
                        <button class="btn btn-complete update-status" data-order-id="{{ $order->id }}" data-status="complete">Mark as Complete</button>
                    @endif
                </div>
            </div>
        </div>


        <!-- Order Bottom Section: Buyer Details -->
        <div class="order-card-buyer-details">
            <!-- Payment Details -->
            @if ($order->payment_details)
                <h4>Payment Details:</h4>
                <p><strong>Bank Name:</strong> {{ $order->payment_details['bank_name'] ?? 'N/A' }}</p>
                <p><strong>Account Number:</strong> {{ $order->payment_details['account_number'] ?? 'N/A' }}</p>
                <p><strong>Account Title:</strong> {{ $order->payment_details['account_title'] ?? 'N/A' }}</p>
                <p><strong>IBAN:</strong> {{ $order->payment_details['iban'] ?? 'N/A' }}</p>
                <p><strong>SWIFT Code:</strong> {{ $order->payment_details['swift_code'] ?? 'N/A' }}</p>
                <p><strong>Branch Address:</strong> {{ $order->payment_details['branch_address'] ?? 'N/A' }}</p>
            @else
                <p>No payment details available.</p>
            @endif
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endforeach

<!-- Add improved CSS styles -->
<style>
    .order-card {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .order-card-left,
    .order-card-middle,
    .order-card-right,
    .order-card-buyer-details {
        flex: 1;
        min-width: 250px;
    }

    .order-card-left {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .product-info {
        margin-top: 10px;
    }

    .product-name, .product-quantity, .product-total {
        font-size: 16px;
        font-weight: 600;
        margin: 2px 0;
    }

    .order-card-middle {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    .payment-info {
        font-size: 14px;
        font-weight: 500;
        color: #333;
    }

    .payment-info p {
        margin: 5px 0;
    }

    .order-card-right {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    .status-actions {
        margin-top: 10px;
    }

    .status-buttons {
        margin-top: 15px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 10px;
    }

    .status-buttons .btn {
        font-size: 14px;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-complete {
        background-color: #6c757d;
        color: white;
    }

    .btn-complete:hover {
        background-color: #5a6268;
    }

    .order-card-buyer-details {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        padding-left: 20px;
    }

    .order-card-buyer-details h4 {
        margin-bottom: 10px;
        font-weight: 600;
        color: #333;
    }

    .order-card-buyer-details p {
        font-size: 14px;
        margin: 4px 0;
    }
</style>

<!-- jQuery and CSRF Token -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Ensure CSRF token is included in AJAX requests
    $(document).ready(function() {
        // Set CSRF token globally for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Handle status change on button click
        $(document).on('click', '.update-status', function(e) {
            e.preventDefault();

            var orderId = $(this).data('order-id');
            var newStatus = $(this).data('status');
            
            // Send AJAX request to update order status
            $.ajax({
                url: '/order/' + orderId + '/update-status',  // URL for updating order status
                method: 'POST',
                data: {
                    status: newStatus,
                },
                success: function(response) {
                    // Update the order status text
                    $('#order-status-' + orderId).text(response.status.charAt(0).toUpperCase() + response.status.slice(1));

                    // Optionally disable buttons after the status is updated
                    $('.update-status[data-order-id="' + orderId + '"]').prop('disabled', true);
                    alert(response.message);
                },
                error: function() {
                    alert('Error: Could not update the order status.');
                }
            });
        });
    });
</script>

@endsection