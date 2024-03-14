<?php

namespace App\Services;

use App\Models\SdDesign;
use App\Models\SdDesignD;
use App\Models\SdDesignTag;

class OrdersService extends Service
{

    protected $sdDesign, $sdDesignD, $sdDesignTag;
    
    public function __construct(SdDesign $sdDesign, SdDesignD $sdDesignD, SdDesignTag $sdDesignTag)
    {
        $this->sdDesign = $sdDesign;
        $this->sdDesignD = $sdDesignD;
        $this->sdDesignTag = $sdDesignTag;
    }
}