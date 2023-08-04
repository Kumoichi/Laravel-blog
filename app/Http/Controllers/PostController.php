<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Response;


class PostController extends Controller
{
    public function index(){      
    return view('posts.index', [
        //filter is calling the scopeFilter method
        //adding a parameter of category
        'posts' => Post::latest()->filter(
            request(['search','category', 'author'])
            )->simplePaginate(6)->withQueryString()
        ]);
}

    public function show(Post $post)
    {
        return view ('posts.show', [
            'post' => $post
        ]);
    }
    
    public function create()
    {

        return view ('posts.create');
    }   
    
    
}