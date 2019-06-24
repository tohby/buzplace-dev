@extends('layouts/master')
@section('content')
    <div class="container-fluid" id="app">
        <div class="card border-0">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col-lg-6"><h2 class="font-weight-bold">Consultations</h2></div>
                    </div>            
                </div>
            </div>
        </div>

        @if (Auth::user()->is_admin == true)
            @include('consultations/read')
        @else
        @include('consultations/write')
        @endif
    </div>
@endsection