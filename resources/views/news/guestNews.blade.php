@extends('layouts.app')

@section('content')
<div class="container">
    <section class="pt-0 mt-5">
        <div class="row">
            <div class="col"><h3 class="h2">Featured</h3></div>
        </div>
        <div class="row">
            <div class="col-md-7 col-lg-8 d-flex">
                <a href="#" class="card card-body overlay border-0 text-light mb-md-0 justify-content-end">
                    <div class="position-relative">
                        <span class="badge badge-primary">Tech</span>
                        <div class="my-3">
                            <h2>Choosing the right build tools for your next project</h2>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="assets/img/avatars/female-4.jpg" alt="Avatar" class="avatar avatar-sm mr-2">
                            <div>
                                <div class="flex-shrink-0">by Annabelle Roberts</div>
                            </div>
                        </div>
                    </div>
                    <img src="assets/img/article-8.jpg" alt="Image" class="rounded bg-image">
                </a>
            </div>
            <div class="col-md-5 col-lg-4"></div>
        </div>
    </section>
</div>
@endsection