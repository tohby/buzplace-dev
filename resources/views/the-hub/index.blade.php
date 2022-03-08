@extends('layouts/master')
@section('content')
<div class="container justify-content-center mb-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body">

                    <!-- Form -->
                    <form action="{{action("HubController@store")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <textarea name="description" class="form-control form-control-flush form-control-auto"
                                data-toggle="autosize" rows="3" placeholder="Start a post..."
                                style="overflow: hidden; overflow-wrap: break-word; height: 69px;" required></textarea>
                        </div>
                        <div id="uploads-preview" class="row align-items-start"></div>
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Icons -->
                                <div id="upload">
                                    <label for="images" class="text-reset mr-3 upload">
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-images"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.002 4h-10a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-10-1a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-10z" />
                                            <path
                                                d="M10.648 8.646a.5.5 0 0 1 .577-.093l1.777 1.947V14h-12v-1l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z" />
                                            <path fill-rule="evenodd"
                                                d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM4 2h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1v1a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </label>
                                    <input id="images" name="images[]" type="file" class="d-none" multiple
                                        accept="image/*" />
                                </div>
                            </div>
                            <div class="col-auto">
                                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div id="msg" class="mt-n3 ml-2">

            </div>

            <div class="infinite-scroll">
                @if ($posts)
                @foreach ($posts as $post)
                <div class="justify-content-center">
                    <div class="pt-2">
                        <div class="card">
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
                                    <span class="avatar-image-wrapper mr-3">
                                        <img alt="" class="avatar-image" src="{{ $post->user->avatar }}">
                                    </span>
                                    <div class="media-body">
                                        <h4 class="card-title mt-0">{!!$post->user->display_name!!}</h4>
                                        <p class="card-text">
                                            {{Str::limit($post->content, 400)}}
                                        </p>
                                   
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#{{$post->slug}}Modal">
                                            <i class="far fa-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('the-hub/show')
                @endforeach
                {{ $posts->links() }}
                @endif
            </div>
        </div>
        <div class="col-lg-4 d-sm-none d-md-block">
            <div class="mb-3 sticky-top t-5">
                <div class="col">
                    <a href="#"
                        class="bg-primary-3-alt rounded p-4 d-flex align-items-center justify-content-center min-vh-20">
                        <span class="text-small text-primary-3">Advertisement</span>
                    </a>
                </div>
            </div>
        </div>
        {{-- @include('the-hub/create') --}}
    </div>

    @endsection

    @section('scripts')
    
    @endsection