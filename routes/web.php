<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|   
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {

    \Illuminate\Support\Facades\DB::listen(function ($query){
        logger($query->sql, $query->bindings);
        });  

    return view('posts', ['posts' => Post::with('category')->get()]);
});


Route::get('posts/{post:slug}', function (Post $post) {
    // $post = Post::findOrFail($post);
  
    return view ('post', [
        'post' => $post
    ]);
});

//if you just have category, it looks for an id
//if you have category:slug it looks for slug inside the category
Route::get('categories/{category:slug}', function (Category $category) {
    return view ('posts', [
   
// <!-- This route binds the 'Category' model based on the provided category ID.
//      The 'posts' view will display all posts associated with the selected category. -->

        'posts' => $category->posts
    ]);
});
    