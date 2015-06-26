@extends('app')

@section('content')
    <h3>Witte a New Article</h3>
    <hr/>

    {!! Form::open(['url' => 'articles']) !!}

    @include('articles._form', ['submitButtonText' => 'Add article'])

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
    {{--@if($errors->any())--}}
        {{--<ul class="alert alert-danger">--}}
            {{--@foreach($errors->all() as $error)--}}
                {{--<li>{{ $error  }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--@endif--}}
    @include('errors.list')

    {!! Form::close() !!}
@stop