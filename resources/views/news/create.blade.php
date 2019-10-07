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
                <form action="{{action("NewsController@store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Headline</label>
                        <input type="text" class="form-control" name="headline" aria-describedby="emailHelp"
                            placeholder="Enter News Headline">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">News Content</label>
                        <textarea class="form-control" name="content" id="news-content" rows="3"></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection