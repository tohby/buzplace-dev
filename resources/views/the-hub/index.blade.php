@extends('layouts/master') 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{route('the-hub.create')}}" class="btn btn-primary btn-lg btn-block">Create new post</a>
        </div>
    </div>

    @if ($posts)
    @foreach ($posts as $post)
    <div class="row justify-content-center">
        <div class="col-md-6" style="padding-top: 1rem;">
            <div class="card">
                <div class="gallery">
                    <img src="{{$post->image}}" alt="Post image" class="card-img-top gallery__img">
                    <div class="gallery__item">
                        <a href="{{ $url = isset($facebook) ? $facebook : '' }}" target="_blank">
                            <ion-icon class="post-icon" name="logo-facebook"></ion-icon>
                        </a>
                        <a href="{{ $url = isset($twitter) ? $twitter : '' }}" target="_blank">
                            <ion-icon class="post-icon" name="logo-twitter"></ion-icon>
                        </a>
                        <a href="{{ $url = isset($linkedin) ? $linkedin : '' }}" target="_blank">
                            <ion-icon class="post-icon" name="logo-linkedin"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <img src="{{ Avatar::create($post->user->name)->toBase64() }}" class="mr-3" />
                        <div class="media-body">
                            <h4 class="card-title mt-0">{{$post->title}}</h4>
                            <p class="card-text">
                                {{str_limit($post->content, 200)}}
                            </p>
                            <a href="{{ route('post.view', $post->slug) }}" class="btn btn-info">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif

</div>
@endsection