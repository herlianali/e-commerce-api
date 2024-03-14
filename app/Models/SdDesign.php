<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdDesign extends Model
{
    use HasFactory;

    protected $table = 'sddesign';
    protected $fillable = [ 
        'nama', 
        'jenis', 
        'keterangan', 
        'qty', 
        'qty_actual', 
        'is_siang_malam', 
        'link', 
        'link_gambar_awal', 
        'print_awal', 
        'print', 
        'no_design', 
        'desainer', 
        'is_aktif', 
        'urutan', 
        'ot_now', 
        'ot_max', 
        'ot1', 
        'ot2', 
        'ot3', 
        'ot4', 
        'ot5', 
        'created_at', 
        'updated_at', 
        'deleted_at', 
        'created_by', 
        'updated_by', 
        'deleted_by' 
    ];
}
