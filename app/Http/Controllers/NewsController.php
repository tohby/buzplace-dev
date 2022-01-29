<?php

namespace App\Http\Controllers;

use App\News;
use App\Canvas;
use App\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Canvas::whereNotNull('published_at')->count();
        $headlines = Canvas::whereNotNull('published_at')->take(5)->get();
        $news = Canvas::whereNotNull('published_at')->skip(5)->take($count)->get();
        if (Auth::check()) {
            return view('news/index', compact('headlines', $headlines))->with('news', $news);
        }else{
            return view('news/guestNews', compact('headlines', $headlines))->with('news', $news);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Canvas $canvas)
    {
        if (Auth::check()) {
            return view('news/news-item')->with('canvas', $canvas);
        }else{
            return view('news/guest_details')->with('canvas', $canvas);
        }
    }
}
