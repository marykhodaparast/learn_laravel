@extends('layouts.app')
@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Enter title">
        <input type="submit" name="submit">
    </form>
@endsection
