<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        //This method returns a Category model associated with 
        //the current Post model based on the value of the
        // category_id foreign key.
        return $this->hasMany(Post::class);
    }
}
