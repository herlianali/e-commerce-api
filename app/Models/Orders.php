<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [ 
        'is_checkout', 
        'tracking_name', 
        'customer_id', 
        'customer_contact', 
        'status', 
        'amount', 
        'sales_tax', 
        'paid_total', 
        'total', 
        'coupon_id', 
        'discount', 
        'payment_method_id', 
        'payment_id', 
        'payment_gateway', 
        'payment_url', 
        'payment_total', 
        'payment_recurring', 
        'payment_expired_date', 
        'billing_address', 
        'logistics_provider', 
        'delivery_fee', 
        'delivery_time', 
        'rating', 
        'deleted_at', 
        'created_at', 
        'updated_at' 
    ];
}
