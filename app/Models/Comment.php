<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content','author_name','author_email','post_id','user_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user() // if using auth
    {
        return $this->belongsTo(User::class);
    }
}
