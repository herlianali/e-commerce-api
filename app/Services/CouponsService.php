<?php

namespace App\Services;

use App\Models\Coupons;

class CouponsService extends Service
{

    protected $coupons;
    
    public function __construct(Coupons $coupons)
    {
        $this->coupons = $coupons;
    }
}