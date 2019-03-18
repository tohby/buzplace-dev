@extends('layouts/master') 
@section('content')
<div class="container-fluid">
    <h2 class="font-weight-bold"> {{$directory->name}}</h2>
<br>
    <div class="container">
        <div class="col-lg-8">
            <div class="card bg-0 border-0 transparent">
            <div class="card-body">
                <p class="card-text">{{$directory->description}}</p>
                <div class="float-right">
                    <strong>{{$directory->location}}</strong>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection