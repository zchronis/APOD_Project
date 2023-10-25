@extends('includes.header')

@section('body')

    <p>{{$user->user_name}}</p>
    @if(count($fav_photos) > 1)
        @foreach($fav_photos as $photo)
            <p>$photo->hdurl</p>
        @endforeach
    @endif

@endsection
