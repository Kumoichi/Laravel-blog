<!doctype html>

<head>
<title>My blog</title>
<link rel="stylesheet" href="app.css">
</head>

<body>

@foreach($posts as $post)
<!-- If $loop->even is true (even iteration), it will set the class to "foobar".

If $loop->even is false (odd iteration), it will set the class to an empty 
string (''), effectively not adding any class. -->
<article class="{{ $loop->even ? 'foobar' : ''}}">
    <h1>
        <a href="/posts/{{ $post->slug }}">
            {{ $post->title }}
        </a>
    </h1>
    <div>
        {{ $post->excerpt}}
    </div>
</article>  
@endforeach  
</body>
