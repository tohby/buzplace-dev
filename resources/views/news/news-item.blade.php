@extends('layouts/master') 
@section('content')
<div class="container-fluid">
    <h2 class="font-weight-bold"> {{$news->headline}}</h2>
<br>
    <div class="container">
        <div class="col-lg-8">
            <div class="card bg-0 border-0 transparent">
            <img src="{{$news->image}}" class="card-img-top" alt="..." style="max-width:700px">
            <div class="card-body">
                <p class="card-text">{{$news->content}}</p>
                <div class="float-right">
                    <small>{{$news->created_at->diffForHumans()}}</small>
                </div>
            </div>
        </div>
        </div>
        

    </div>

</div>
@endsection