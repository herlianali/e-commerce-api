<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MmbarangBatch extends Model
{
    use HasFactory;

    protected $table = 'mmbarang_batch';
    protected $fillable = [ 
        'mmbarang_jenis_id', 
        'mmbarang_id', 
        'wo_grading_id', 
        'kode', 
        'tag', 
        'nama_barang', 
        'nama_batch', 
        'deskripsi', 
        'tgl_create', 
        'tgl_exp', 
        'doc_id', 
        'doc_type', 
        'ref_id', 
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
        'deleted_by', 
        'jenis_proses', 
        'no_design', 
        'sddesign_d_id', 
        'sddesign_id', 
        'nama_design', 
        'warna', 
        'jenis_kain', 
        'qty_awal' 
    ];
}
