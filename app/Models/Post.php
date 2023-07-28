<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // You can use Post::create to make new column. this is called fillable property.
    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

    // Due to the $with variable, Laravel will include additional JOIN clauses 
    //in the query to eagerly load the associated category and author models for each post.
    // It will fetch the related data in a few queries instead of executing 
    //separate queries for each post,
    protected $with = ['category', 'author'];
    
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


// to update the value in the column, use
// $post->update(['excerpt' => 'Changed'])