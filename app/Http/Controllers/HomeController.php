<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function landingPage(){
        $news = News::take(3)->orderBy('created_at', 'desc')->get();
        return view('index', compact('news'));
    }
}
