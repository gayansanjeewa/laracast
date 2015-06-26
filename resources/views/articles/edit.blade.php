@extends('app')

@section('content')
    <h3>Edit: {!! $article->title !!}</h3>
    <hr/>
    {{-- Here insted of Form::open(), Form:model($modelname, ...) has been used to populate data into form --}}
    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}

    @include('articles._form', ['submitButtonText' => 'Update article'])

    {{--<div class="form-group">--}}
        {{--{!! Form::label('title', 'Title:') !!}--}}
        {{--{!! Form::text('title', null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('body', 'Body:') !!}--}}
        {{--{!! Form::textarea('body', null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('published_at', 'Published On:') !!}--}}
        {{--{!! Form::input('date', 'published_at', date('Y-m-d'), ['class'=>'form-control']) !!}--}}
    {{--</div>--}}


    {{--<div class="form-group">--}}
        {{--{!! Form::submit('Add Article', ['class'=>'btn btn-primary form-control']) !!}--}}
    {{--</div>--}}

    {{--{{ var_dump($errors) }}--}}
    @include('errors.list')

    {{--@if($errors->any())--}}
        {{--<ul class="alert alert-danger">--}}
            {{--@foreach($errors->all() as $error)--}}
                {{--<li>{{ $error  }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--@endif--}}

    {!! Form::close() !!}
@stop