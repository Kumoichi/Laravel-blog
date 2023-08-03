<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // You can use Post::create to make new column. this is called fillable property.

    // Due to the $with variable, Laravel will include additional JOIN clauses 
    //in the query to eagerly load the associated category and author models for each post.
    // It will fetch the related data in a few queries instead of executing 
    //separate queries for each post,
    protected $with = ['category', 'author'];

    //include scope inside the function name.
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->where(fn($query) => 
            $query->where('title', 'like', '%' . $search . '%')));
        
            $query->when($filters['category'] ?? false, fn($query, $category) =>
                $query->whereHas('category', fn ($query) => $query->where('slug', $category)));

            $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn ($query) => $query->where('username', $author)));
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

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