<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =[
        'category_id',
        'title',
        'description',
        'is_active',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id'); 
    }
    public function likes()
    {
        return $this->hasMany(Like::class,'post_id');
    }
}
