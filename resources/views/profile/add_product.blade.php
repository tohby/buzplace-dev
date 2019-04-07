@extends('layouts/master')
@section('content')
<div class="container-fluid">
    Add Product
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['method'=>'POST', 'action'=>'ProfileController@store_product', 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Image:') !!}
                    {!! Form::file('image', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Add Product', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
