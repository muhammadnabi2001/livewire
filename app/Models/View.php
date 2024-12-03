<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable=[
        'post_id',
        'user_ip',
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
