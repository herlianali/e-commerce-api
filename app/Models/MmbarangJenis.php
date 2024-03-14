<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MmbarangJenis extends Model
{
    use HasFactory;

    protected $table = 'mmbarang_jenis';
    protected $fillable = [
        'jenis_kain',
        'jenis_proses',
        'is_fashion',
        'deskripsi',
        'fungsi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
