<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //I can use belongsTo User in Comment.php because  comments belongs to posts table 
    //and posts belongs to users table
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

