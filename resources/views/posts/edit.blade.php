@extends('layouts.app')
@section('content')
    <h1>Edit Post</h1>
    {!! Form::model($post,['method' => 'PATCH', 'action' => ['PostsController@update',$post->id]]) !!}
    @csrf
    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Post',['class' => 'btn btn-warning']) !!}
    </div>
    {!! Form::close()  !!}

    {!! Form::open(['method' => 'DELETE', 'action' => ['PostsController@destroy',$post->id]]) !!}
    @csrf
    <div class="form-group">
        {!! Form::submit('Delete Post',['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close()  !!}
@endsection
