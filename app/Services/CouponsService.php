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

    public function searchCoupons($params)
    {
        $coupons = $this->coupons;

        return $this->searchResponse($params, $coupons);
    }

    
}