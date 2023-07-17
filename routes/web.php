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
    $files =  File::files(resource_path("posts"));
    $posts = []; 

    foreach($files as $file){
        $documents = YamlFrontMatter::parseFile($file);

        $posts[] = new Post(
            $documents->title,
            $documents->excerpt,
            $documents->date,
            $documents->body()
        );
    }

    return view('posts', ['posts' => $posts]);
    // $post = Post::all();
    // return view ('posts', [
    //     'posts' => $post
    // ]);
});


Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);
    
    return view ('post', [
        'post' => $post
    ]);
})->where('post','[A-z_\-]+');
