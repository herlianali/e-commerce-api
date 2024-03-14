<?php

namespace App\Services;

use App\Models\Orders;
use App\Models\OrderStatus;

class OrdersService extends Service
{

    protected $order, $orderStatus;
    
    public function __construct(Orders $order, OrderStatus $orderStatus)
    {
        $this->order = $order;
        $this->orderStatus = $orderStatus;
    }
}