<?php
namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    // Constructor
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }



    public static function all(){
        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        ));

        // $files =  File::files(resource_path("posts/"));
        
        // return array_map(fn($file) => $file->getContents(), $files); 
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