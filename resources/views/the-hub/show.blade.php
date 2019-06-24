@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="col-lg-4">
            <div class="share">
                <a href="{{ $url = isset($twitter) ? $twitter : '' }}" target="_blank">
                    <ion-icon class="icon" name="logo-twitter"></ion-icon>
                </a>
                <a href="{{ $url = isset($whatsapp) ? $whatsapp : '' }}" target="_blank">
                    <ion-icon class="icon" name="logo-whatsapp"></ion-icon>
                </a>
                <a href="{{ $url = isset($pinterest) ? $pinterest : '' }}" target="_blank">
                    <ion-icon class="icon" name="logo-pinterest"></ion-icon>
                </a>
                <a href="{{ $url = isset($linkedin) ? $linkedin : '' }}" target="_blank">
                    <ion-icon class="icon" name="logo-linkedin"></ion-icon>
                </a>
                <a href="{{ $url = isset($facebook) ? $facebook : '' }}" target="_blank">
                    <ion-icon class="icon" name="logo-facebook"></ion-icon>
                </a>
            </div>
        </div>
        <div class="col-lg-8 offset-2">
            <h1 class="mt-4">{{ $posts->title }}</h1>
            <p class="lead">
                by
                <a>{{ $posts->user->name }}</a>
            </p>
            <hr>
            <p>Posted {{$posts->created_at->diffForHumans()}}</p>
            <hr>
            <img src="{{$posts->image}}" alt="" class="img-fluid rounded">
            <hr>
            <p style="text-align: justify;">{{ $posts->content }}</p>
        </div>
    </div>
    {{--<div class="container-fluid">--}}
    {{--<h2 class="font-weight-bold"> {{$news->headline}}</h2>--}}
    {{--<br>--}}
    {{--<div class="container">--}}
    {{--<div class="col-lg-8">--}}
    {{--<div class="card bg-0 border-0 transparent">--}}
    {{--<img src="{{$news->image}}" class="card-img-top" alt="..." style="max-width:700px">--}}
    {{--<div class="card-body">--}}
    {{--<p class="card-text">{{$news->content}}</p>--}}
    {{--<div class="float-right">--}}
    {{--<small>{{$news->created_at->diffForHumans()}}</small>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{----}}

    {{--</div>--}}

    {{--</div>--}}
@endsection
