<?php

namespace App\Services;

use App\Models\Mmbarang;
use App\Models\MmbarangJenis;
use App\Models\MmbarangJenisPrice;

class MmbarangService extends Service
{

    protected $mmbarang, $mmbarangJenis, $mmbarangJenisPrice;

    public function __construct(Mmbarang $mmbarang, MmbarangJenis $mmbarangJenis, MmbarangJenisPrice $mmbarangJenisPrice )
    {
        $this->mmbarang = $mmbarang;
        $this->mmbarangJenis = $mmbarangJenis;
        $this->mmbarangJenisPrice = $mmbarangJenisPrice;    
    }
}