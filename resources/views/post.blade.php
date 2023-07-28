<x-layout>

<article>
        <h1>{!! $post->title !!}</h2>

       <p>
        By <a href="">{{$post->author->name}}</a> in <a href="{{$post->category->slug}}">{{$post->category->name}}</a></p>

        <div>
            {!! $post->body !!}
        </div>
    </article>

    <a href="/">Go Back</a>

</x-layout>