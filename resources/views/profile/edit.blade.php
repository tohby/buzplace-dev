@extends('layouts/master')
@section('content')
<div class="container-fluid">
    <h2>Edit User</h2>
    <div class="row">
        <div class="col-sm-3">
            <img style="width: 100%; border-radius: 8px;" src="/images/{{$user->avatar}}" alt="Profile Image">
        </div>
        <div class="col-sm-6 offset-md-2">
            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['ProfileController@update', $user->id], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'minlength'=>4]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class'=>'form-control', 'readonly'=>'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('location', 'Location:') !!}
                    {!! Form::text('location', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('avatar', 'Avatar:') !!}
                    {!! Form::file('avatar', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('website', 'Website:') !!}
                    {!! Form::url('website', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', 'Phone:') !!}
                    {!! Form::number('phone', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('businessName', 'Business Name:') !!}
                    {!! Form::text('businessName', null, ['class'=>'form-control', 'minlength'=>4]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Update Profile', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
