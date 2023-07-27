<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // You can use Post::create to make new column. this is called fillable property.
    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

    public function category()
    {
        //This method returns a Category model associated with 
        //the current Post model based on the value of the
        // category_id foreign key.
        //one to many relationship. one is the foreignID inside the $post, many is the Category table data.
        return $this->belongsTo(Category::class);
    }
}


// to update the value in the column, use
// $post->update(['excerpt' => 'Changed'])