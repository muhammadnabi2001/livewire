<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yangiliklar extends Model
{
    protected $fillable =[
        'title',
        'description',
        'img',
        'status'
    ];
}
