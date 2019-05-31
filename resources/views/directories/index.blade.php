@extends('layouts/master') 
@section('content')
<div class="container-fluid">
    <div class="card border-0">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-lg-6"><h2 class="font-weight-bold">Directories</h2></div>
                    <div class="col-lg-{{Auth::user()->is_admin == true ? 4 : 6}}">
                        <form class="form-group d-inline form-group-lg" action="{{action("DirectoriesController@search")}}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="searchKey" placeholder="Press Enter To Search">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Powered by &nbsp; <i class="fab fa-algolia" style="font-size:18px"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (Auth::user()->is_admin == true)
                    <div class="col-lg-2">
                        <a href="/directories/create" class="btn btn-primary btn-lg float-right" role="button" aria-pressed="true"><i
                                class="fas fa-plus"></i>&nbsp; Create</a>   
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
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