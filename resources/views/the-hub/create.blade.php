@extends('layouts/master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Create Posts</h1>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-lg-6">
                @if (session('post_message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('post_message') }}
                    </div>
                @endif
                {!! Form::open(['method'=>'POST', 'action'=>'HubController@store', 'files'=>true]) !!}

                    <div class="form-group">

                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null, ['class'=>'form-control', 'required'=>'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('image', 'Image:') !!}
<<<<<<< HEAD
                        {!! Form::file('image', ['required'=>'required']) !!}
=======
                        {!! Form::file('image') !!}
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff

                    </div>

                    <div class="form-group">

                        {!! Form::label('content', 'Description:') !!}
                        {!! Form::textarea('content', null, ['class'=>'form-control', 'required'=>'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::submit('Create post', ['class'=>'btn btn-primary']) !!}

                    </div>

                    {{--}}{{csrf_field()}} {{-- For avoiding an exception --}}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
