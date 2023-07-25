<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
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

Route::get('posts/{post}', function ($id) {
    $post = Post::findOrFail($id);
    
    return view ('post', [
        'post' => $post
    ]);
});
