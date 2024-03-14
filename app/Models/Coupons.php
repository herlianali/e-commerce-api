<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;

    protected $table = 'coupons';
    protected $fillable = [
        'code',
        'description',
        'image',
        'type',
        'amount',
        'active_from',
        'expire_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
