@extends('layouts.app')
@section('content')
{{--    @include()--}}
    <h1>Contact page</h1>
    @if(count($people))
        <ul>
            @foreach($people as $person)
                <li>{{$person}}</li>
            @endforeach
        </ul>

    @endif
@endsection
@section('footer')
{{--    <script>alert('hello visitor')</script>--}}

@stop

