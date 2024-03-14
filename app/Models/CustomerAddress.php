<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $table = 'customer_address';
    protected $fillable = [
        'title',
        'type',
        'default',
        'address',
        'customer_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
