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
            {{-- {!!Auth::user()->avatar!!} --}}
            @if (Auth::user()->hasVerifiedEmail())
            <div class="card">
                <div class="card-body">

                    <!-- Form -->
                    <form>
                        <div class="form-group">
                            <textarea class="form-control form-control-flush form-control-auto" data-toggle="autosize"
                                rows="3" placeholder="Start a post..."
                                style="overflow: hidden; overflow-wrap: break-word; height: 69px;"></textarea>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Icons -->
                                <div id="upload">
                                    <label for="image-input" class="text-reset mr-3 upload">
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-images"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.002 4h-10a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-10-1a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-10z" />
                                            <path
                                                d="M10.648 8.646a.5.5 0 0 1 .577-.093l1.777 1.947V14h-12v-1l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z" />
                                            <path fill-rule="evenodd"
                                                d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM4 2h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1v1a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1z" />
                                        </svg><span class="text-muted font-weight-light"> Add Images</span>
                                    </label>
                                    <input id="image-input" name="images[]" type="file" class="d-none" multiple
                                        accept="image/*" />
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            @else
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                        class="bi bi-exclamation-triangle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.938 2.016a.146.146 0 0 0-.054.057L1.027 13.74a.176.176 0 0 0-.002.183c.016.03.037.05.054.06.015.01.034.017.066.017h13.713a.12.12 0 0 0 .066-.017.163.163 0 0 0 .055-.06.176.176 0 0 0-.003-.183L8.12 2.073a.146.146 0 0 0-.054-.057A.13.13 0 0 0 8.002 2a.13.13 0 0 0-.064.016zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                        <path
                            d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                    </svg> Your account is not verified!</h4>
                <p>As a precaution towards protecting this community, you are not allowed to post unless your
                    account has been verified.
                </p>
                <hr>
                <p class="mb-0">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </p>
            </div>
            @endif


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