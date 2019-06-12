@extends('layouts/master') 
@section('content')
<div class="container-fluid">
<<<<<<< HEAD
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
=======
    <div class="row">
        <div class="col-lg-3 overflow-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>News</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 overflow-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title">
                                Posts
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <a href="{{route('the-hub.create')}}"
                                class="float-right">Create
                                new post</a>
                        </div>
                    </div>
                </div>
            </div>

            @if ($posts)
            @foreach ($posts as $post)
            <div class="row justify-content-center">
                <div style="padding-top: 1rem;">
                    <div class="card">
                        <div class="gallery">
                            <img src="{{$post->image}}" alt="Post image" class="card-img-top gallery__img">
                            {{-- <div class="gallery__item">
                                <a href="{{ $url = isset($facebook) ? $facebook : '' }}" target="_blank">
                            <ion-icon class="post-icon" name="logo-facebook"></ion-icon>
                            </a>
                            <a href="{{ $url = isset($twitter) ? $twitter : '' }}" target="_blank">
                                <ion-icon class="post-icon" name="logo-twitter"></ion-icon>
                            </a>
                            <a href="{{ $url = isset($linkedin) ? $linkedin : '' }}" target="_blank">
                                <ion-icon class="post-icon" name="logo-linkedin"></ion-icon>
                            </a>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="media">
                            <img src="{{ $post->user->getUrlfriendlyAvatar() }}" class="mr-3">
                            <div class="media-body">
                                <h4 class="card-title mt-0">{{$post->title}}</h4>
                                <p class="card-text">
                                    {{str_limit($post->content, 200)}}
                                </p>
                                <a href="{{ route('post.view', $post->slug) }}" class="btn btn-info">View</a>
                            </div>
>>>>>>> f7832db18035a24b9df551e841c33c2f15bb627a
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
<<<<<<< HEAD
        </div>
    </div>
    @endforeach
    @endif

=======
            @endforeach
            @endif
        </div>
        <div class="col-lg-3 overflow-auto">
            <div class="card">
                <div class="card-header">
                    Something
                </div>
            </div>
=======
>>>>>>> parent of f7832db... June 6
        </div>
        @endforeach
        @endif
    </div>
    <div class="col-lg-3 overflow-auto">
        <div class="card">
            <div class="card-header">
                Something
            </div>
        </div>
    </div>
>>>>>>> f7832db18035a24b9df551e841c33c2f15bb627a
</div>


</div>
@endsection