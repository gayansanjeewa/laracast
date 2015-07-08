{{--{!! Form::hidden('user_id', 1) !!}--}}

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Published On:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {{--{!! Form::select('tags[]', $tags, null, ['class'=>'form-control', 'multiple']) !!}--}}
    {{-- After applying form model binding we could leave it as it is--}}
    {{--{!! Form::select('tag_list[]', $tags, $article->tagList(), ['class'=>'form-control', 'multiple']) !!}--}}
    {!! Form::select('tag_list[]', $tags, null, ['class'=>'form-control', 'multiple']) !!}
</div>
{{-- below both work--}}
{{--{{ $article->tagList() }}--}}
{{--{{ $article->tag_list }}--}}


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>