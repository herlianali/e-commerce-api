<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $tables = 'produk';
    protected $fillables = [
        'id',
        'nama_produk',
        'harga',
        'kategory',
        'brand',
        'size',
        'color',
        'rating',
        'options',
        'image',
    ];
}
