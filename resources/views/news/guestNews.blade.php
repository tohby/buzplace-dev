@extends('layouts.app')

@section('content')
<section class="py-6">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="#"
                    class="bg-primary-3-alt rounded p-4 d-flex align-items-center justify-content-center min-vh-20">
                    <span class="text-small text-primary-3">Advertisement</span>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="pt-0 m-5">
    @if ($headlines->count() > 0)
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="h2">Featured</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-lg-8 d-flex">
                <a href="news/{{$headlines[0]->slug}}"
                    class="card card-body overlay border-0 text-light mb-md-0 justify-content-end">
                    <div class="position-relative">
                        <span class="badge badge-primary">Business</span>
                        <div class="my-3">
                            <h2>{{$headlines[0]->title}}</h2>
                        </div>
                    </div>
                    <img src="{{$headlines[0]->featured_image}}" alt="Image" class="rounded bg-image">
                </a>
            </div>
            
            
            <div class="col-md-5 col-lg-4">
                <ul class="list-unstyled list-articles">
                    @foreach ($headlines as $headline)
                    @if (!$loop->first)
                    <li class="row row-tight">
                        <a href="news/{{$headline->slug}}" class="col-3 col-md-4">
                            @if ($headline->featured_image != null)
                            <img src="{{$headline->featured_image}}" alt="Image" class="rounded">
                            @else
                            <img src="/storage/canvas/images/default.png" alt="Image" class="rounded">
                            @endif
                        </a>
                        <div class="col d-flex flex-column justify-content-center">
                            <div>
                                <a href="news/{{$headline->slug}}">
                                    <h6 class="mb-1">{{$headline->title}}</h6>
                                </a>
                                <div class="d-flex text-small">
                                    <a href="news/{{$headline->slug}}">Business</a>
                                    <span class="text-muted ml-1">{{$headline->published_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
</section>
@if($news->count() > 0)
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="h2">Latest</h3>
            </div>
        </div>
        <div class="row mb-4">
            @foreach ($news as $news_item)
            <div class="col-md-6 col-lg-4 d-flex">
                @if ($news_item->featured_image != null)
                <div class="card">
                    <a href="news/{{$news_item->slug}}">
                        <img src="{{$news_item->featured_image}}" alt="Image" class="card-img-top">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="text-small d-flex">
                                <div class="mr-2">
                                    <span class="text-primary">Business</span>
                                </div>
                                <span class="text-muted">{{$headline->published_at->diffForHumans()}}</span>
                            </div>
                        </div>
                        <a href="news/{{$news_item->slug}}">
                            <h4>{{$news_item->title}}</h4>
                        </a>
                        <p class="flex-grow-1">
                            {{Str::words($news_item->summary, 10, ' ...')}}
                        </p>
                    </div>
                </div>
                @else
                <a href="news/{{$news_item->slug}}"
                    class="card card-body justify-content-between bg-primary text-light">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="text-small d-flex">
                            <div class="mr-2">
                                Business
                            </div>
                            <span class="opacity-70">{{$news_item->published_at->diffForHumans()}}</span>
                        </div>
                    </div>
                    <div>
                        <h2>{{$news_item->title}}</h2>
                        <p class="flex-grow-1">
                            {{Str::words($news_item->summary, 10, ' ...')}}
                        </p>
                    </div>
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection