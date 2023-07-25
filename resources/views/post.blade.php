<x-layout>

<article>
        <h1>{!! $post->title !!}</h2>

        <div>
            {!! $post->body !!}
        </div>
    </article>

    <a href="/">Go Back</a>

</x-layout>