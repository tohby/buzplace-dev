@extends('layouts/master')
@section('content')
<div class="container-fluid">
    <div class="card border-0">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="font-weight-bold">Directories</h2>
                    </div>
                    <div class="col-lg-{{Auth::user()->is_admin == true ? 4 : 6}}">
                        <form class="form-group d-inline form-group-lg"
                            action="{{action("DirectoriesController@search")}}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="searchKey"
                                    placeholder="Press Enter To Search">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Powered by &nbsp; <i class="fab fa-algolia" style="font-size:14px"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (Auth::user()->is_admin == true)
                    <div class="col-lg-2">
                        <a href="/directories/create" class="btn btn-primary btn-lg float-right" role="button"
                            aria-pressed="true"><i class="fas fa-plus"></i>&nbsp; Create</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    @if (count($directories) >= 1)
    <div class="container-fluid">
        <div class="card-deck">
            @foreach ($directories as $directory)
            <div class="col-lg-3">
                <div class="card border-0 transparent">
                    <img src="/storage/directories/{{$directory->image}}" class="card-img-top news-img rounded-lg"
                        alt="...">
                    <div class="card-body">
                        <a href="/directories/{{$directory->id}}">
                            <h3 class="card-title font-weight-bold">{{$directory->name}}</h3>
                        </a>
                        <p class="card-text">{!!str_limit($directory->description, 200, '...')!!}</p>
                        <div class="float-right">
                            <small>{{$directory->location}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="float-right">
        {{$directories->links()}}
    </div>
    @endif
    @endsection