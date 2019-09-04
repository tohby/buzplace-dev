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
            <p class="lead">
                by
                <a href="#">Admin</a>
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
                        {!! Form::open(['method'=>'POST', 'action'=>'NewsController@storeComment', 'class' => 'createCommentForm']) !!}
                        <input type="hidden" name="news_id" value="{{$news->id}}" class="news-id">
                        <div class="form-group">
                            {!! Form::textarea('body', null , array('class'=>'form-control comment-body', 'rows'=>3, 'required'=>'required')) !!}
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
                            <img style="height: 3.66rem; width: 3.66rem;" src="{{ $comment->photo ? '/images/'.$comment->photo : Auth::user()->gravatar }}" alt="" class="d-flex mr-3 rounded-circle">
                            <div class="media-body">
                                <h5 class="mt-0">{{$comment->author}}</h5>
                                {{$comment->body}}
<<<<<<< HEAD
                                <div class="toggle" style="display: flex; justify-content: space-between">
                                    @if ($comment->author === Auth::user()->name)
                                        {!! Form::open(['method'=>'GET', 'action'=>['NewsController@editComment', $comment->id], 'style'=>'margin-top:3px;']) !!}
                                            <input type="hidden" name="news_id" value="{{$news->id}}">
                                            <div class="form-group">
                                                {!! Form::submit('Edit', ['class' => 'btn btn-info btn-edit-comment']) !!}
=======
                                <div class="toggle" style="display: flex;">
                                    @if ($comment->author === Auth::user()->name)
                                        {!! Form::open(['method'=>'GET', 'action'=>['NewsController@editComment', $comment->id], 'style'=>'margin-top:3px']) !!}
                                            <input type="hidden" name="news_id" value="{{$news->id}}">
                                            <div class="form-group">
                                                {!! Form::submit('Edit', ['style'=>'background:none;outline:none;border:none;text-decoration:underline;color:blue;cursor:pointer;margin-left:-5px']) !!}
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
                                            </div>
                                        {!! Form::close() !!}
                                        {!! Form::open(['method'=>'GET', 'action'=>['NewsController@deleteComment', $comment->id], 'style'=>'margin-top:3px']) !!}
                                            <div class="form-group">
<<<<<<< HEAD
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
=======
                                                {!! Form::submit('Delete', ['style'=>'background:none;outline:none;border:none;text-decoration:underline;color:blue;cursor:pointer;margin-left:-5px']) !!}
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
                                            </div>
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                                @if ($comment->reply)
                                    @foreach($comment->reply as $replies)
                                        <div class="toggle-comment-reply">
                                            <div class="media mt-4">
                                                <img style="height: 3.66rem; width: 3.66rem;" src="{{ $replies->photo ? '/images/'.$replies->photo : 'via.placeholder.com/50' }}" alt="" class="d-flex mr-3 rounded-circle">
                                                <div class="media-body">
                                                    <h5 class="mt-0">{{ $replies->author }}</h5>
                                                    {{ $replies->body }}
<<<<<<< HEAD
                                                    <div style="display: flex; justify-content: space-between">
                                                        @if ($replies->author === Auth::user()->name)
                                                            {!! Form::open(['method'=>'GET', 'action'=>['CommentRepliesController@edit', $replies->id], 'style'=>'margin-top:3px;']) !!}
                                                                <input type="hidden" name="news_id" value="{{$news->id}}">
                                                                <div class="form-group">
                                                                    {!! Form::submit('Edit', ['class'=>'btn btn-info']) !!}
=======
                                                    <div style="display: flex;">
                                                        @if ($replies->author === Auth::user()->name)
                                                            {!! Form::open(['method'=>'GET', 'action'=>['CommentRepliesController@edit', $replies->id], 'style'=>'margin-top:3px']) !!}
                                                                <input type="hidden" name="news_id" value="{{$news->id}}">
                                                                <div class="form-group">
                                                                    {!! Form::submit('Edit', ['style'=>'background:none;outline:none;border:none;text-decoration:underline;color:blue;cursor:pointer;margin-left:-5px']) !!}
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
                                                                </div>
                                                            {!! Form::close() !!}
                                                            {!! Form::open(['method'=>'GET', 'action'=>['CommentRepliesController@destroy', $replies->id], 'style'=>'margin-top:3px']) !!}
                                                                <div class="form-group">
<<<<<<< HEAD
                                                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
=======
                                                                    {!! Form::submit('Delete', ['style'=>'background:none;outline:none;border:none;text-decoration:underline;color:blue;cursor:pointer;margin-left:-5px']) !!}
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
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
                                        {!! Form::open(['method'=>'GET', 'action'=>'CommentRepliesController@update', 'style'=>'margin-top:15px', 'id'=>'reply']) !!}
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
                                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store', 'style'=>'margin-top:15px', 'id'=>'reply']) !!}
                                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                            <div class="form-group">
<<<<<<< HEAD
                                                {!! Form::text('body', null, array('class'=>'form-control', 'id'=>'autofocus', 'autocomplete'=>'off', 'required'=>'required')) !!}
=======
                                                {!! Form::text('body', null, ['class'=>'form-control', 'id'=>'autofocus']) !!}
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
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
<<<<<<< HEAD

@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
=======
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
