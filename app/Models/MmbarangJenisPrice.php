<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MmbarangJenisPrice extends Model
{
    use HasFactory;

    protected $table = 'mmbarang_jenis_price';
    protected $fillable = [
        'mmbarang_jenis_id',
        'min_qty',
        'max_qty',
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
