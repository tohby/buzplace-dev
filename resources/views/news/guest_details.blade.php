@extends('layouts.app')
@section('content')
<section class="pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Business News
                            </li>
                        </ol>
                    </nav>
                </div>
                <h1>{{$canvas->title}}</h1>
                <div class="d-flex align-items-center">

                    <div>
                        <div>by <span>Buzplace</span>
                        </div>
                        <div class="text-small text-muted">{{$canvas->published_at->diffForHumans()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section data-reading-position="">
    <div class="container">
        <div class="row justify-content-center position-relative">
            <div class="col-lg-10 col-xl-8">
                @if($canvas->featured_image != null)
                <img src="{{$canvas->featured_image}}" alt="Image" class="rounded">
                @endif
            </div>
        </div>
        <section class="has-divider">
            <div class="container pt-2">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <hr>
                        <div class="d-flex align-items-center">
                            <span class="text-small mr-1">Share this article:</span>
                            <div class="d-flex mx-2">
                                <div class="addthis_inline_share_toolbox"></div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </section>
        <div class="my-2 row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <article class="article">
                    {!!$canvas->body!!}
                </article>
            </div>
        </div>
    </div>
</section>
<section class="has-divider">
    <div class="container pt-2">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <hr>
                <div class="d-flex align-items-center">
                    <span class="text-small mr-1">Share this article:</span>
                    <div class="d-flex mx-2">
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div class="divider">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="96px"
            viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" class="injected-svg bg-primary-alt"
            data-src="assets/img/dividers/divider-1.svg">
            <path d="M0,0 C40,33 66,52 75,52 C83,52 92,33 100,0 L100,100 L0,100 L0,0 Z"></path>
        </svg>
    </div>
</section>
@endsection