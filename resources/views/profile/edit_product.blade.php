@extends('layouts/master')
@section('content')
    <div class="container-fluid">
        Edit Product
    </div>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-3">
            <img style="width: 100%; border-radius: 8px;" src="/images/{{$product->image}}" alt="Profile Image">
        </div>
        <div class="col-sm-6 offset-2">
            {!! Form::model($product, ['method'=>'PATCH', 'action'=>['ProductsController@update', $product->id], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Image:') !!}
                    {!! Form::file('image', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Update Product', ['class'=>'btn btn-primary col-sm-3']) !!}
                </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['ProductsController@destroy', $product->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Remove Product', ['class'=>'btn btn-danger col-sm-3']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
    
@endsection
