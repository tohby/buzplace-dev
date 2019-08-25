@extends('layouts/master')
@section('content')
<div class="container-fluid">
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
                            <a href="{{route('the-hub.create')}}" class="float-right">Create
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
                        </div>
                        <div class="card-body">
                            <div class="media">
                                <input type="hidden" class="hidden-{{$post->id}}" value={{ $post->user->slug }}>
                                <img src="{{ $post->user->getUrlfriendlyAvatar() }}" class="mr-3">
                                <div class="media-body">
                                    <h4 class="card-title mt-0">{{$post->title}}</h4>
                                    <p class="card-text">
                                        {{str_limit($post->content, 200)}}
                                    </p>
                                    <a href="{{ route('post.view', $post->slug) }}" class="btn btn-info">View</a>
                                    Contact
                                    <ion-icon
                                        name="mail"
                                        title="Contact the Author"
                                        class="contact {{$post->id}}">
                                    </ion-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    </div>
</div>
@endsection

@section('scripts')
    <script>
        setTimeout(() => {
            let btns = document.getElementsByClassName('contact');
            Array.from(btns).forEach(el => {
                el.addEventListener('click', () => {
                    let id = el.classList[1];
                    let slug = document.querySelector(`.hidden-${id}`).value;
                    window.location.href = `messages/${slug}`;
                });
            });
        }, 1000);
    </script>
@endsection
