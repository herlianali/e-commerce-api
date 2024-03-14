<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdDesignD extends Model
{
    use HasFactory;

    protected $table = 'sddesign_d';
    protected $fillable = [ 
        'sddesign_id', 
        'warna', 
        'jenis_warna', 
        'keterangan', 
        'link', 
        'created_at', 
        'updated_at', 
        'deleted_at', 
        'created_by', 
        'updated_by', 
        'deleted_by' 
    ];
}
