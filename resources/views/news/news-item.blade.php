@extends('layouts/master')
@section('content')
    <div class="container">
        <div class="col-lg-8 offset-2">
            <h1 class="mt-4">{{ $news->headline }}</h1>
            <p class="lead">
                by
                <a href="#">News Author</a>
            </p>
            <hr>
            <p>Posted {{$news->created_at->diffForHumans()}}</p>
            <hr>
            <img src="{{$news->image}}" alt="" class="img-fluid rounded">
            <hr>
            <p style="text-align: justify;">{{ $news->content }}</p>
            <hr>
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'NewsController@storeComment']) !!}
                        <input type="hidden" name="news_id" value="{{$news->id}}">
                        <div class="form-group">
                            <span style="display: none;">{{ $comment = isset($comment) ? $comment->body : '' }}</span>
                            {!! Form::textarea('body', $comment, ['class'=>'form-control', 'rows'=>3]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Comment', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {{csrf_field()}}
                    {!! Form::close() !!}
                </div>
            </div>
            @if(Auth::check())
                @if(count($comments) > 0)
                    @foreach ($comments as $comment)
                        <div class="media mb-4">
                            <img style="height: 3.66rem; width: 3.66rem;" src="{{ $comment->photo ? '/images/'.$comment->photo : Auth::user()->gravatar }}" alt="" class="d-flex mr-3 rounded-circle">
                            <div class="media-body">
                                <h5 class="mt-0">{{$comment->author}}</h5>
                                {{$comment->body}}
                                <div class="toggle" style="display: flex;">
                                    @if ($comment->author === Auth::user()->name)
                                        {!! Form::open(['method'=>'GET', 'action'=>['NewsController@editComment', $comment->id], 'style'=>'margin-top:3px']) !!}
                                            <input type="hidden" name="news_id" value="{{$news->id}}">
                                            <div class="form-group">
                                                {!! Form::submit('Edit', ['style'=>'background:none;outline:none;border:none;text-decoration:underline;color:blue;cursor:pointer;margin-left:-5px']) !!}
                                            </div>
                                        {!! Form::close() !!}
                                        {!! Form::open(['method'=>'GET', 'action'=>['NewsController@deleteComment', $comment->id], 'style'=>'margin-top:3px']) !!}
                                            <div class="form-group">
                                                {!! Form::submit('Delete', ['style'=>'background:none;outline:none;border:none;text-decoration:underline;color:blue;cursor:pointer;margin-left:-5px']) !!}
                                            </div>
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                                @if ($comment->reply)
                                    @foreach($comment->reply as $reply)
                                        <div class="toggle-comment-reply">
                                            <div class="media mt-4">
                                                <img style="height: 3.66rem; width: 3.66rem;" src="{{ $reply->photo ? '/images/'.$reply->photo : 'via.placeholder.com/50' }}" alt="" class="d-flex mr-3 rounded-circle">
                                                <div class="media-body">
                                                    <h5 class="mt-0">{{ $reply->author }}</h5>
                                                    {{ $reply->body }}
                                                    <div style="display: flex;">
                                                        @if ($reply->author === Auth::user()->name)
                                                            {!! Form::open(['method'=>'GET', 'action'=>['CommentRepliesController@edit', $comment->id], 'style'=>'margin-top:3px']) !!}
                                                            <div class="form-group">
                                                                {!! Form::submit('Edit', ['style'=>'background:none;outline:none;border:none;text-decoration:underline;color:blue;cursor:pointer;margin-left:-5px']) !!}
                                                            </div>
                                                            {!! Form::close() !!}
                                                            {!! Form::open(['method'=>'GET', 'action'=>['CommentRepliesController@destroy', $reply->id], 'style'=>'margin-top:3px']) !!}
                                                                <div class="form-group">
                                                                    {!! Form::submit('Delete', ['style'=>'background:none;outline:none;border:none;text-decoration:underline;color:blue;cursor:pointer;margin-left:-5px']) !!}
                                                                </div>
                                                            {!! Form::close() !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="toggle-reply-form">
                                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store', 'style'=>'margin-top:15px', 'id'=>'reply']) !!}
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                        <div class="form-group">
                                            {!! Form::text('body', null, ['class'=>'form-control', 'autofocus'=>'true', 'id'=>'autofocus']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
                                        </div>
                                        {{ csrf_field() }}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
{{--<div class="container-fluid">--}}
    {{--<h2 class="font-weight-bold"> {{$news->headline}}</h2>--}}
{{--<br>--}}
    {{--<div class="container">--}}
        {{--<div class="col-lg-8">--}}
            {{--<div class="card bg-0 border-0 transparent">--}}
            {{--<img src="{{$news->image}}" class="card-img-top" alt="..." style="max-width:700px">--}}
            {{--<div class="card-body">--}}
                {{--<p class="card-text">{{$news->content}}</p>--}}
                {{--<div class="float-right">--}}
                    {{--<small>{{$news->created_at->diffForHumans()}}</small>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{----}}

    {{--</div>--}}

{{--</div>--}}
@endsection
