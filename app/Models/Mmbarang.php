<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mmbarang extends Model
{
    use HasFactory;

    protected $table = 'mmbarang';
    protected $fillable = [ 
        'mmbarang_jenis_id', 
        'kode', 
        'tag', 
        'nama_barnag', 
        'nama_batch', 
        'deskripsi', 
        'keterangan', 
        'transaksi', 
        'qty', 
        'qty_doc', 
        'konversi', 
        'grade', 
        'created_at', 
        'updated_at', 
        'deleted_at', 
        'created_by', 
        'updated_by', 
        'created_by', 
        'jenis_proses', 
        'no_design', 
        'sddesign_d_id', 
        'sddesign_id', 
        'nama_design', 
        'warna', 
        'jenis_kain', 
        'qty_awal', 
        'qty_view', 
        'qty_view_real', 
        'qty_order', 
        'qty_order_real', 
    ];
}
