@extends('layouts/master')
@section('content')
<div class="container-fluid">

    <div class="card border-0">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="font-weight-bold"> {{$directory->name}}</h2>
                    </div>
                    @if (Auth::user()->is_admin == true)
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col">
                                <a href="/directories/{{$directory->id}}/edit" class="btn btn-primary btn-lg float-right" role="button" aria-pressed="true">
                                    <i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>
                            </div>
                            <div class="col">
                                <a href="/directories/create" class="btn btn-danger btn-lg float-right" role="button" aria-pressed="true">
                                    <i class="far fa-trash-alt"></i>&nbsp; Delete</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="container">
        <div class="col-lg-8">
            <div class="card bg-0 border-0">
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