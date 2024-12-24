<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable=[
        'chat_id',
        'text'
    ];
    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }
    public function chat()
    {
        return $this->belongsTo(ChatId::class,'chat_id');
    }
}
