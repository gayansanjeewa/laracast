@extends('app')

@section('content')
    <h3>{{ $article->title }}</h3>

    <article>{{ $article->body }}</article>

    @unless ($article->tags->isEmpty())
    <h5>Tags:</h5>
    <ul>
        @foreach($article->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
    @endunless
@stop