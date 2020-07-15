@extends('layouts/master') 
@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-lg-6"><h2 class="font-weight-bold">News</h2></div>
                    <div class="col-lg-6">
                        @if (Auth::user() != NULL && Auth::user()->is_admin == true)
                        <a href="/news/create" class="btn btn-primary btn-lg float-right" role="button" aria-pressed="true"><i class="fas fa-plus"></i>&nbsp; Create</a>
                        @endif
                    </div>
                </div>            
            </div>
        </div>
    </div>
    <br> @if (count($news) >= 1)
    <div class="card-columns">
        @foreach ($news as $news_item)
        <div class="card border-0 transparent">
            <img src="/storage/news-images/{{$news_item->image}}" class="card-img-top news-img rounded-lg" alt="...">
            <div class="card-body">
                <a href="/news/{{$news_item->id}}">
                    <h3 class="card-title font-weight-bold">{{$news_item->headline}}</h3>
                </a>
                <p class="card-text">{!!Str::limit($news_item->content, 200, '...')!!}</p>
                <div class="float-right">
                    <small>{{$news_item->created_at->diffForHumans()}}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="float-right">
        {{$news->links()}}
    </div>
    @endif

</div>
@endsection