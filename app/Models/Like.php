<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable=[
        'post_id',
        'user_ip',
        'status'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }
}
