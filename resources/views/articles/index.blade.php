@extends('app')

@section('content')
    <h3>Articles</h3>

    @foreach($articles as $article)
        <article>
            <h2>
                {{--<a href="articles/{{ $article->id }}">{{ $article-> title }}</a>--}}
                {{--<a href="{{ action('ArticlesController@show', ['id'=>$article->id]) }}">{{ $article-> title }}</a>--}}
                <a href="{{ url('/articles', $article->id) }}">{{ $article-> title }}</a>
            </h2>

            <div class="body">{{ $article->body }}</div>
        </article>
    @endforeach
@stop