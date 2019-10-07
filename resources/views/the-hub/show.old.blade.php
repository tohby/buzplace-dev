@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="col-lg-8 offset-2">
            <h1 class="mt-4">{{ $post->title }}</h1>
            <p class="lead">
                by
                <a>{{ $post->user->name }}</a>
            </p>
            <hr>
            <p>Posted {{$post->created_at->diffForHumans()}}</p>
            <hr>
            <img src="{{$post->image}}" alt="" class="img-fluid rounded">
            <hr>
            <p style="text-align: justify;">{{ $post->content }}</p>
        </div>
    </div>
@endsection
