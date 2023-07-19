@extends('layout')

@section('content')

<article>
        <h1>{{ $post->title}}</h2>

        <div>
            {!! $post->body !!}
        </div>
    </article>

    <a href="/">Go Back</a>

@endsection