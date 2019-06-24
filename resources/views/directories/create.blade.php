@extends('layouts/master')
@section('content')
<div class="container-fluid">
    <div class="card border-0">
        <div class="card-body">
           <h3 class="card-title">
               Create New Directory
           </h3>
        </div>
    </div>
<br>
    <div class="card border-0">
        <div class="card-body">
            <form action="{{action("DirectoriesController@store")}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Company Name:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        aria-describedby="emailHelp"
                        placeholder="Enter company name"
                    >
                </div>

                <div class="form-group">
                    <label for="description">Company Description:</label>
                    <textarea 
                        class="form-control" 
                        name="description" 
                        rows="3">
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="location">Company Location:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="location" 
                        aria-describedby="emailHelp"
                        placeholder="Enter company location"
                    >
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection