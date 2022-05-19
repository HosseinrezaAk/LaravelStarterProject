@extends('layouts.app')




@section('content')
    <h1>Edit View</h1>
    <form method="post" action="/api/posts">
        <input type="text" name="title" placeholder="Enter title" >
        <input type="submit" name="submit">
    </form>

@endsection
