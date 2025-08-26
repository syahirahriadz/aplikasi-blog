<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//class Post - not connect with database

class Post extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'content',
        'image',
        'category',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
}


