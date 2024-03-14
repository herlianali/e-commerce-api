<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $table = 'customer';
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'is_active',
        'shop_id',
        'phone',
        'avatar',
        'bio',
        'socials',
        'contact',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
