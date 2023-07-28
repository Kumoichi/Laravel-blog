<!-- by calling x-layout you are going to layout.blade first -->
<x-layout content="Hello there">
    @foreach($posts as $post)
    <article>
        <h1>
        <a href="/posts/{{ $post->slug }}">
                {!! $post->title !!}
            </a>
        </h1>
        <p>By <a href="">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
        <div>{{ $post->excerpt }}</div>
    </article>
    @endforeach
</x-layout>