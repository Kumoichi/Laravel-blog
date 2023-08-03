<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        //it is ensuring that comments section needs to be filled when you press post.
        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            //accessing current authenticated logged in users id is retrieved
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
