<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view ('admin.posts.create');
    }   
    

    public function store()
    {
        $attributes = request()->validate([
            'title' => "required|max:255",
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails','public');
        
        //to store new data in the posts table
        Post::create($attributes);
        
        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit',['post' => $post]);
    }

    public function update (Post $post)
    {
        $attributes = request()->validate([
            'title' => "required|max:255",
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts','slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')]
        ]);

        
        if (isset($attributes['thumbnail'])) {
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails','public');
        }


        $post->update($attributes);

        return redirect('/')->with('success','PostUpdated!');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success','Post Deleted!');
    }
}
