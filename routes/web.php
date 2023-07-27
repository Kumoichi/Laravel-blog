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
    //getting data from posts table and assigning in it to 
    //posts and then rendering that to posts.blade.php
    return view('posts', ['posts' => Post::all()]);
});

//When a user visits a URL like /posts/my-first-post,
// Laravel will automatically query the database for 
//a Post model instance where the slug attribute matches
// 'my-first-post'. It will then pass that instance to 
//the function as the $post variable.

// this function (Post $post) does the same thing as Post::findOrFail($post);
Route::get('posts/{post:slug}', function (Post $post) {
    // $post = Post::findOrFail($post);
    
    return view ('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category}', function (Category $category) {
    return view ('posts', [
   
// <!-- This route binds the 'Category' model based on the provided category ID.
//      The 'posts' view will display all posts associated with the selected category. -->

        'posts' => $category->posts
    ]);
});
    