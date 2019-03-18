@extends('layouts/master') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card border-0">
                <img class="card-img-top img-fluid" src="/storage/profile/{{$user->avatar}}" alt="Profile image">
                <div class="card-body">
                    <h3 class="card-title font-weight-bold">{{$user->name}}</h3>
                    @if (Auth::user()->slug == $user->slug)
                    <p> <i class="fas fa-map-marked-alt"> </i> {{ $user->location == null ? " Nill" : $user->location}}</p>
                    <p> <i class="far fa-envelope"> </i> {{ $user->email == null ? " Nill" : $user->email}}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card border-0">
                <div class="card-body">
                    <H1>Description</H1>
                </div>
            </div>
            <div class="card border-0 my-3">
                <div class="card-body">
                    <H1>Products</H1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 {{-- <img src="/storage/profile/{{$user->avatar}}" class="rounded-circle" alt="Cinque Terre" height="15%">
<h1 class="display-5 py-2 font-weight-bold">{{$user->name}}</h1> @if ($user->hasVerifiedEmail())
<i class="far fa-check-circle"></i> @endif
<div class="py-2">
    @if (Auth::user()->slug == $user->slug) @if ($user->location == null)
    <i class="fas fa-map-marked-alt py-3"> </i> <small class="text-muted">Please provide your Location</small> <br> @else
    <i class="fas fa-map-marked-alt py-3"> </i> <strong>{{$user->location}}</strong> <br> @endif
    <i class="far fa-envelope py-3"> </i> <strong class="text-muted"> <a href="mailto:{{$user->email}}">{{$user->email}}</a></strong>    <br> @if ($user->phone == null)
    <i class="fas fa-phone py-3"></i> <small class="text-muted">Please provide your phone number</small> <br> @else
    <i class="fas fa-phone py-3"></i> <strong>{{$user->phone}}</strong> <br> @endif @if ($user->website == null)
    <i class="fas fa-link py-3"></i> <small class="text-muted">Please provide your website address</strong> <br>
                            @else 
                            <i class="fas fa-link py-3"></i> <strong>{{$user->website}}</strong> <br>
                        @endif 
                        <a href="/profile/{{$user->slug}}/edit" class="btn btn-primary btn-block py-3"> Edit</a>
                    @else
                        @if ($user->location != null)
                        <i class="fas fa-map-marked-alt py-3"> </i> <strong>{{$user->location}}</strong> <br>
                        @endif
                        <i class="far fa-envelope py-3"> </i> <strong> <a href="mailto:{{$user->email}}">{{$user->email}}</a></strong> <br>
                        @if ($user->phone != null)
                        <i class="fas fa-phone py-3"></i> <strong>{{$user->phone}}</strong> <br>
                        @endif
                        @if ($user->website != null)
                        <i class="fas fa-link py-3"></i> <strong>{{$user->website}}</strong> <br>
                        @endif
                    @endif --}}