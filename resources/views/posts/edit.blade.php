@extends('layouts.app')




@section('content')
    <h1>Edit View</h1>
{{--    <form method="post" action="/api/posts/{{$post->id}}">--}}
        {!! Form::model($post, ['method'=>'PATCH', 'route'=>['posts.update',$post->id]]) !!}
            {{csrf_field()}}
{{--        <input type="hidden" name="_method" value="PUT">--}}
{{--        <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">--}}
{{--        <input type="submit" name="submit" value="UPDATE">--}}
            {!! Form::label('title','Title: ') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
            {!! Form::submit('Update Post',['class'=>"btn btn-info"]) !!}
        {!! Form::close() !!}

    <form method="post" action="/api/posts/{{$post->id}}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="DELETE">

    </form>

@endsection
