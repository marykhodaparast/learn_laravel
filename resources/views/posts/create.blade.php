@extends('layouts.app')
@section('content')
    <h1>Create Post</h1>
    {{-- <form action="/posts" method="POST"> --}}
        {!! Form::open() !!}
        @csrf
        <input type="text" name="title" placeholder="Enter title">
        <input type="submit" name="submit">
    </form>
@endsection
