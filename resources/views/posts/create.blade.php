@extends('layouts.app')




@section('content')
    <h1>Create View</h1>
{{--    <form method="post" action="/api/posts">--}}
    {!! Form::open(['method'=>'POST', 'route'=>'posts.store']) !!}

        <div class="form-group">
            {!! Form::label('title','Title: ') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
        
    {!! Form::close() !!}


@endsection
