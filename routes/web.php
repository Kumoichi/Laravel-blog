<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
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


Route::get('/', [PostController::class, 'index'])->name('home');


Route::get('posts/{post:slug}', [PostController::class, 'show']);

//if you just have category, it looks for an id
//if you have category:slug it looks for slug inside the category
Route::get('categories/{category:slug}', function (Category $category) {
    return view ('posts', [
   
// <!-- This route binds the 'Category' model based on the provided category ID.
//      The 'posts' view will display all posts associated with the selected category. -->

        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');


Route::get('author/{author:username}', function (User $author) {
    return view ('posts', [
        //at this point posts model will be send to the posts.blade
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});