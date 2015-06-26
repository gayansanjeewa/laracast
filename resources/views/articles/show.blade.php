@extends('app')

@section('content')
    <h3>{{ $article->title }}</h3>

    <article>{{ $article->body }}</article>
@stop