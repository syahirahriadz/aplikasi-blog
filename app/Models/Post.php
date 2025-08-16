<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//class Post - not connect with database

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author',
        'author_info',
        'image',
        'category',
    ];
}
