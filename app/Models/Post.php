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
        //by using function collect() you can use map
        //this is like start of the for loop. collect is used for storing array.
        return collect(File::files(resource_path("posts")))
        //iterates the value in the collect SplFileInfo. storing each files into $file. 
        //it goes  through one by one. it is ->map is like for loop. 
        //you $file exist for being parsed. one file parsed value is stored in one $document.
        //now that $document has the all file information that is parsed.  
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
