@extends('layouts/master')
@section('content')
    <div class="container-fluid">
        <h2> The Hub</h2>

        <div class="row">
            <div class="col-md-4" style="padding-top: .5rem;">
                <a href="{{route('the-hub.create')}}" class="btn btn-primary">Create new post</a>
            </div>
        </div>

        @if ($posts)
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4" style="padding-top: 1rem;">
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
                                <h4 class="card-title">{{str_limit($post->title, 25)}}</h4>
                                <p class="card-text">
                                    {{str_limit($post->content, 200)}}
                                </p>
                                <a href="{{ route('post.view', $post->slug) }}" class="btn btn-info">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection
