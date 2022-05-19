@extends('layouts.app')




@section('content')
    <h1>Edit View</h1>
    <form method="post" action="/api/posts/{{$post->id}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
        <input type="submit" name="submit" value="UPDATE">
    </form>

    <form method="post" action="/api/posts/{{$post->id}}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="DELETE">

    </form>

@endsection
