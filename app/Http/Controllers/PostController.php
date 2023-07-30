<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(){      
    return view('posts', [
        //filter is calling the scopeFilter method
        //adding a parameter of category
        'posts' => Post::latest()->filter(request(['search','category']))->get(),    
        'categories' => Category::all(),
        'currentCategory' => Category::firstWhere('slug', request('category'))
    ]);
}

    public function show(Post $post)
    {
        return view ('post', [
            'post' => $post
        ]);
    }    
}