<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // You can use Post::create to make new column. this is called fillable property.
    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}


// to update the value in the column, use
// $post->update(['excerpt' => 'Changed'])