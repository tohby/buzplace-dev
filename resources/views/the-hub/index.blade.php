@extends('layouts/master')
@section('content')
<div class="container justify-content-center mb-5">
    <div class="row">
        <div class="col-lg-8">
            {{-- <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title">
                                Posts
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <a href="#" role="button" data-toggle="modal" data-target=".bd-example-modal-xl"
                                class="float-right"><i class="fas fa-plus-circle"></i> Create new post</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="card">
                <div class="card-body">
            
                    <!-- Form -->
                    <form>
                        <div class="form-group">
                            <textarea class="form-control form-control-flush form-control-auto" data-toggle="autosize" rows="3"
                                placeholder="Start a post..."
                                style="overflow: hidden; overflow-wrap: break-word; height: 69px;"></textarea>
                        </div>
                    </form>
            
                    <!-- Footer -->
                    <div class="row align-items-center">
                        <div class="col">
            
                            <!-- Symbols -->
                            <small class="text-muted">
                                0/500
                            </small>
            
                        </div>
                        <div class="col-auto">
            
                            <!-- Icons -->
                            <div class="text-muted">
                                <a class="text-reset mr-3" href="#!" data-toggle="tooltip" title="" data-original-title="Add photo">
                                    <i class="fas fa-camera"></i>
                                    <input name="Select File" type="file" />
                                </a>
                                <a class="text-reset mr-3" href="#!" data-toggle="tooltip" title=""
                                    data-original-title="Attach file">
                                    <i class="fe fe-paperclip"></i>
                                </a>
                                <a class="text-reset" href="#!" data-toggle="tooltip" title="" data-original-title="Record audio">
                                    <i class="fe fe-mic"></i>
                                </a>
                            </div>
            
                        </div>
                    </div>
            
                </div>
            </div>

            @if ($posts)
            @foreach ($posts as $post)
            <div class="justify-content-center">
                <div class="pt-3">
                    <div class="card border-0 shadow">
                        @if (count($post->postImages) > 0)
                        @if (count($post->postImages) > 1)
                        <div id="postImages{{$post->slug}}" class="carousel slide" data-ride="carousel"
                            data-interval="false">
                            <ol class="carousel-indicators">
                                @foreach( $post->postImages as $image )
                                <li data-target="#postImages{{$post->slug}}" data-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($post->postImages as $image)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="/storage/post_images/{{$image->image}}"
                                        class="d-block w-100 img-fluid card-img-top" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#postImages{{$post->slug}}" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#postImages{{$post->slug}}" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        @else
                        <img src="/storage/post_images/{{$post->postImages->first()->image}}"
                            class="d-block w-100 img-fluid card-img-top" alt="...">
                        @endif
                        @endif
                        <div class="card-body">
                            <div class="media">
                                <img src="{{ $post->user->getUrlfriendlyAvatar() }}" class="mr-3">
                                <div class="media-body">
                                    <h4 class="card-title mt-0">{{$post->title}}</h4>
                                    <p class="card-text">
                                        {{str_limit($post->content, 200)}}
                                    </p>
                                    {{-- <a href="{{ route('post.view', $post->slug) }}" class="btn
                                    btn-primary">View</a> --}}
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#{{$post->slug}}Modal">
                                        <i class="far fa-eye"></i> View
                                    </button>
                                    <ion-icon name="mail" title="Contact the Author" class="contact {{$post->id}}">
                                        Contact
                                    </ion-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('the-hub/show')
            @endforeach
            @endif
        </div>
        <div class="col-lg-4 pt-5">
            {{--  <div class="card border-info mb-3 ml-5 sticky-top mt-5">
                <div class="card-body text-info">
                    <h5 class="card-title">Info card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card
                        content.</p>
                </div>
            </div>  --}}
        </div>
        @include('the-hub/create')
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