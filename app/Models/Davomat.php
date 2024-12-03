<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Davomat extends Model
{
    protected $fillable=[
        'user_id',
        'date',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
