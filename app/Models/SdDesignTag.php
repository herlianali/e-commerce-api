<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdDesignTag extends Model
{
    use HasFactory;

    protected $table = 'sddesign_tag';
    protected $fillable = [ 
        'sddesign_id', 
        'keterangan', 
        'created_at', 
        'updated_at', 
        'deleted_at', 
        'created_by', 
        'updated_by', 
        'deleted_by' 
    ];
}
