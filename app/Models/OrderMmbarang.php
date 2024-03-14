<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMmbarang extends Model
{
    use HasFactory;

    protected $table = 'order_mmbarang';
    protected $fillable = [
        'order_id',
        'mmbarang_id',
        'variation_option_id',
        'mmbarang_jenis_price_id',
        'sddesign_id',
        'sddesignd_id',
        'no_design',
        'jenis_kain',
        'jenis_proses',
        'warna',
        'qty_roll',
        'qty',
        'unit_price',
        'subtotal',
        'deleted_at',
        'created_at',
        'updated_at',
        'mmbarang_name',
    ];
}
