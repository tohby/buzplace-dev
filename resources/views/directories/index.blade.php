@extends('layouts/master') 
@section('content')
<div class="container-fluid">
    <h2> Directories</h2>
    @if (count($directories) >= 1) @foreach ($directories as $directory)
    <div class="card">
        <div class="card-body">
            <a href="/directories/{{$directory->id}}"><h4 class="card-title">{{$directory->name}}</h4></a>
            <p class="card-text">{{str_limit($directory->description, 200, '...')}}</p>
            <strong class="float-right">{{$directory->location}}</strong>
        </div>
    </div>
    <br> @endforeach
    <div class="float-right">
        {{$directories->links()}}
    </div>
    @endif
</div>
@endsection