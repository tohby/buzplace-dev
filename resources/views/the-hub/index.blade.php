@extends('layouts/master')
@section('content')
    <div class="container justify-content-center mb-5">
        <div class="row">
            <div class="col-lg-8">
                @livewire('create-hub-posts')
                <section>
                    @livewire('show-posts')
                </section>
            </div>
            <div class="col-lg-4 d-sm-none d-md-block">
                <div class="mb-3 sticky-top t-5">
                    <div class="col">
                        <a href="#"
                            class="bg-primary-3-alt rounded p-4 d-flex align-items-center justify-content-center min-vh-20">
                            <span class="text-small text-primary-3">Advertisement</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
