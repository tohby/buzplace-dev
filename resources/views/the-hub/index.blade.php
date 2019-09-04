@extends('layouts/master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
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
            </div>

            @if ($posts)
            @foreach ($posts as $post)
            <div class="row justify-content-center">
                <div class="pt-3">
                    <div class="card">
                        @if (count($post->postImages) > 0)
                        @if (count($post->postImages) > 1)
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                            data-interval="false">
                            <ol class="carousel-indicators">
                                @foreach( $post->postImages as $image )
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($post->postImages as $image)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="/storage/post_images/{{$image->image}}"
                                        class="d-block w-100 h-100 img-fluid" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        @else
                        <img src="/storage/post_images/{{$post->postImages->first()->image}}"
                            class="d-block w-100 img-fluid" alt="...">
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
                                    <a href="{{ route('post.view', $post->slug) }}" class="btn btn-info">View</a>
                                    
                                    <ion-icon name="mail" title="Contact the Author" class="contact {{$post->id}}">
                                        Contact
                                    </ion-icon>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Create new Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-5">
                    <form action="{{action("HubController@store")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" aria-describedby="emailHelp"
                                placeholder="Enter Post Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" rows="3"
                                placeholder="Enter Post description"></textarea>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image[]" id="customFile" multiple>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
                    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h4 class="modal-title">Create new Post</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body px-5">
                                <form action="{{action("HubController@store")}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" name="title"
                                            aria-describedby="emailHelp" placeholder="Enter Post Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" name="description" rows="3"
                                            placeholder="Enter Post description"></textarea>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image[]" id="customFile"
                                            multiple>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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