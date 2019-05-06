@extends('layouts/master')
@section('content')
    <div class="container-fluid">
        <div class="card border-0">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="font-weight-bold">News</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        <div class="card border-0 mt-3">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Post Title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">New Content</label>
                        <textarea class="form-control" id="news-content" rows="3"></textarea>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection