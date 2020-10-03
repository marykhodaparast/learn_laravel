@extends('layouts.app')
@section('content')
    <h1>Edit Post</h1>
    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" value="{{ $post->title }}" placeholder="Enter title">
        <input type="submit" name="submit" value="UPDATE">
    </form>
    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="DELETE">
    </form>
@endsection
