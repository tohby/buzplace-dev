@extends('layouts/master')
@section('content')
<div class="container">
    <div class="col-lg-4">
        <div class="share">
            <a href="{{ $url = isset($twitter) ? $twitter : '' }}" target="_blank">
                <ion-icon class="icon" name="logo-twitter"></ion-icon>
            </a>
            <a href="{{ $url = isset($whatsapp) ? $whatsapp : '' }}" target="_blank">
                <ion-icon class="icon" name="logo-whatsapp"></ion-icon>
            </a>
            <a href="{{ $url = isset($pinterest) ? $pinterest : '' }}" target="_blank">
                <ion-icon class="icon" name="logo-pinterest"></ion-icon>
            </a>
            <a href="{{ $url = isset($linkedin) ? $linkedin : '' }}" target="_blank">
                <ion-icon class="icon" name="logo-linkedin"></ion-icon>
            </a>
            <a href="{{ $url = isset($facebook) ? $facebook : '' }}" target="_blank">
                <ion-icon class="icon" name="logo-facebook"></ion-icon>
            </a>
        </div>
    </div>
    <div class="col-lg-8 offset-2">
        <h1 class="mt-4">{{ $news->headline }}</h1>
        <hr>
        <p>Posted {{$news->created_at->diffForHumans()}}</p>
        <hr>
        <img src="/storage/news-images/{{$news->image}}" alt="" class="img-fluid rounded">
        <hr>
        <p style="text-align: justify;">{!! $news->content !!}</p>
        <hr>
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                @if (isset($comment))
                {!! Form::open(['method'=>'GET', 'action'=>['NewsController@updateComment', $comment->id]]) !!}
                <input type="hidden" name="news_id" value="{{$news->id}}">
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                <div class="form-group">
                    {!! Form::textarea('body', $comment->body, ['class'=>'form-control', 'rows'=>3]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Update Comment', ['class'=>'btn btn-primary']) !!}
                </div>
                {{csrf_field()}}
                {!! Form::close() !!}
                @else
                {!! Form::open(['method'=>'POST', 'action'=>'NewsController@storeComment', 'class' =>
                'createCommentForm']) !!}
                <input type="hidden" name="news_id" value="{{$news->id}}" class="news-id">
                <div class="form-group">
                    {!! Form::textarea('body', null , array('class'=>'form-control comment-body', 'rows'=>3,
                    'required'=>'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Comment', ['class'=>'btn btn-primary']) !!}
                </div>
                {{csrf_field()}}
                {!! Form::close() !!}
                @endif
            </div>
        </div>
        @if(Auth::check())
        @if(count($comments) > 0)
        @foreach ($comments as $comment)
        <div class="media mb-4">
            <img style="height: 3.66rem; width: 3.66rem;"
                src="{{ $comment->photo ? '/images/'.$comment->photo : Auth::user()->gravatar }}" alt=""
                class="d-flex mr-3 rounded-circle">
            <div class="media-body">
                <h5 class="mt-0">{{$comment->author}}</h5>
                {{$comment->body}}
                <div class="toggle" style="display: flex;">
                    @if ($comment->author === Auth::user()->name)
                    {!! Form::open(['method'=>'GET', 'action'=>['NewsController@editComment', $comment->id],
                    'style'=>'margin-top:3px']) !!}
                    <input type="hidden" name="news_id" value="{{$news->id}}">
                    <div class="form-group">
                        {!! Form::submit('Edit',
                        ['style'=>'background:none;outline:none;border:none;color:blue;cursor:pointer;'])
                        !!}
                    </div>
                    {!! Form::close() !!}
                    {!! Form::open(['method'=>'GET', 'action'=>['NewsController@deleteComment', $comment->id],
                    'style'=>'margin-top:3px']) !!}
                    <div class="form-group ml-2">
                        {!! Form::submit('Delete',
                        ['style'=>'background:none;outline:none;border:none;color:blue;cursor:pointer;'])
                        !!}
                    </div>
                    {!! Form::close() !!}
                    @endif
                </div>
                @if ($comment->reply)
                @foreach($comment->reply as $replies)
                <div class="toggle-comment-reply">
                    <div class="media mt-4">
                        <img style="height: 3.66rem; width: 3.66rem;"
                            src="{{ $replies->photo ? '/images/'.$replies->photo : 'via.placeholder.com/50' }}" alt=""
                            class="d-flex mr-3 rounded-circle">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $replies->author }}</h5>
                            {{ $replies->body }}
                            <div style="display: flex;">
                                @if ($replies->author === Auth::user()->name)
                                {!! Form::open(['method'=>'GET', 'action'=>['CommentRepliesController@edit',
                                $replies->id], 'style'=>'margin-top:3px']) !!}
                                <input type="hidden" name="news_id" value="{{$news->id}}">
                                <div class="form-group">
                                    {!! Form::submit('Edit',
                                    ['style'=>'background:none;outline:none;border:none;text-decoration:underline;color:blue;cursor:pointer;'])
                                    !!}
                                </div>
                                {!! Form::close() !!}
                                {!! Form::open(['method'=>'GET', 'action'=>['CommentRepliesController@destroy',
                                $replies->id], 'style'=>'margin-top:3px']) !!}
                                <div class="form-group ml-2">
                                    {!! Form::submit('Delete',
                                    ['style'=>'background:none;outline:none;border:none;text-decoration:underline;color:blue;cursor:pointer;'])
                                    !!}
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
                    @if (isset($reply))
                    {!! Form::open(['method'=>'GET', 'action'=>'CommentRepliesController@update',
                    'style'=>'margin-top:15px', 'id'=>'reply']) !!}
                    <input type="hidden" name="news_id" value="{{$news->id}}">
                    <input type="hidden" name="reply_id" value="{{$reply->id}}">
                    <div class="form-group">
                        {!! Form::text('body', $reply->body, ['class'=>'form-control', 'id'=>'autofocus']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Update Reply', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {{ csrf_field() }}
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store',
                    'style'=>'margin-top:15px', 'id'=>'reply']) !!}
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    <div class="form-group">
                        {!! Form::text('body', null, ['class'=>'form-control', 'id'=>'autofocus']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {{ csrf_field() }}
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        @endif
        @endif
    </div>
</div>
@endsection