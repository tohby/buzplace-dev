{{-- modal --}}
<div class="modal fade bd-example-modal-xl" id="{{$post->slug}}Modal" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" data-target="CarouselPostImages{{$post->slug}}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            {{-- <div class="modal-header border-0">
                <h4 class="modal-title">{{$post->title}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body p-0">
               <div class="row">
                   <div class="col-md-7">
                       @if (count($post->postImages) > 0)
                        @if (count($post->postImages) > 1)
                        <div id="{{$post->slug}}" class="carousel slide" data-ride="carousel" data-interval="false">
                            <ol class="carousel-indicators">
                                @foreach( $post->postImages as $image )
                                <li data-target="#{{$post->slug}}" data-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($post->postImages as $image)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="/storage/post_images/{{$image->image}}" class="d-block w-100 img-fluid card-img-top" alt="...">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#{{$post->slug}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#{{$post->slug}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        @else
                        <img src="/storage/post_images/{{$post->postImages->first()->image}}" class="d-block w-100 img-fluid card-img-top"
                            alt="...">
                        @endif
                        @endif
                   </div>
                   <div class="col-md-5 p-2">
                       <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>