<div>
    {{-- The whole world belongs to you. --}}
    @if ($posts)
        @foreach ($posts as $post)
            <div class="justify-content-center mt-3">
                <div class="pt-2">
                    <div class="card border-0 shadow-sm">

                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <span class="avatar-image-wrapper flex-shrink-0">
                                    <img alt="" class="avatar-image" src="{{ $post->user->avatar }}">
                                </span>
                                <div class="flex-grow-1 ms-2">
                                    <h4 class="card-title display_name">{!! $post->user->display_name !!}</h4>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            <p class="card-text align-middle">
                                {{ Str::limit($post->content, 400) }}
                            </p>
                            @if ($post->postImages()->exists())
                                <div class="row my-2">
                                    @if (count($post->postImages) === 1)
                                        <div class="col">
                                            <img src="/storage/hub_images/{{ $post->postImages[0]->image }}"
                                                class="img-fluid hub_image" alt="...">
                                        </div>
                                    @elseif (count($post->postImages) === 2)
                                        @foreach ($post->postImages as $postImage)
                                            <div class="col">
                                                <img src="/storage/hub_images/{{ $postImage->image }}"
                                                    class="img-fluid hub_image" alt="...">
                                            </div>
                                        @endforeach
                                    @elseif(count($post->postImages) >= 3)
                                        <div class="col-6">
                                            <img src="/storage/hub_images/{{ $post->postImages[0]->image }}"
                                                class="img-fluid hub_image" alt="...">
                                        </div>
                                        <div class="col-6">
                                            <div class="row row-cols-1">
                                                @foreach ($post->postImages as $key => $postImage)
                                                    @if ($key > 0 && $loop->iteration <= 2)
                                                        <div class="col">
                                                            <div class="hub_container">
                                                                <img src="/storage/hub_images/{{ $postImage->image }}"
                                                                    class="img-fluid hub_image d-block" alt="...">
                                                                <div class="more_images">
                                                                    <div
                                                                        class="h1 position-absolute top-50 start-50 translate-middle">
                                                                        +{{ count($post->postImages) - 2 }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    @else
        No posts
    @endif
</div>
