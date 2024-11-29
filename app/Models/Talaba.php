<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talaba extends Model
{
    protected $fillable=[
        'fio',
        'manzil',
        'yosh',
        'yunalish',
        'kurs',
        'is_active'
    ];
}
