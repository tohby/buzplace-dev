@extends('layouts/master') 
@section('content')
<div class="container-fluid">
    <div class="card border-0">
        <div class="card-body">
            <div class="card-title">
                <h2 class="font-weight-bold">News</h2>
            </div>
        </div>
    </div>
    <br> @if (count($news) >= 1)
    <div class="card-columns">
        @foreach ($news as $news_item)
        <div class="card border-0 transparent">
            <img src="{{$news_item->image}}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="/news/{{$news_item->id}}">
                    <h3 class="card-title font-weight-bold">{{$news_item->headline}}</h3>
                </a>
                <p class="card-text">{{str_limit($news_item->content, 200, '...')}}</p>
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