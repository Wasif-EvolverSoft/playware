<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_order_id',
        'customer_id',
        'full_name',
        'email',
        'phone_number',
        'shipping_address',
        'billing_address',
        'total_amount',
        'paymentCheck',
        'paymentType',
        'order_items',
        'payment_details',
        'status'
    ];

    protected $casts = [
        'order_items' => 'array',
        'payment_details' => 'array',
    ];

    // Calculate the total amount of the order from the order items
    public function calculateTotalAmount()
    {
        $total = 0;

        foreach ($this->order_items as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }
        public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
