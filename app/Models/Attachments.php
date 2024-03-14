<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    use HasFactory;

    protected $table = 'attachments';
    protected $fillable = [
        'url',
        'doc_type',
        'doc_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
