@extends('layouts/master')
@section('content')
<div class="container-fluid" id="app">
    @if (Auth::user()->is_admin == true)
    @include('consultations/read')
    @else
    @include('consultations/write')
    @endif
</div>
@endsection