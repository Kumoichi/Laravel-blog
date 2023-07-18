<?php
namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;

    // Constructor
    public function __construct($title, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }



    public static function all(){
        $files =  File::files(resource_path("posts/"));
        
        return array_map(fn($file) => $file->getContents(), $files); 
    }

    public static function find($slug){
        
    $path = resource_path("posts/{$slug}.html"); // Corrected the path generation using `resource_path()` function.

    if (!file_exists($path)) {
        throw new ModelNotFoundException("Post not found"); 
    }

    $post = cache()->remember($slug, 1200, function () use ($path) {
        return file_get_contents($path);
    });

    return $post;
    }
}