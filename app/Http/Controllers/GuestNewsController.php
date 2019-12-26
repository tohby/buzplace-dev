<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class GuestNewsController extends Controller
{
    //
    public function posts(){
        $news = News::simplePaginate(15);
        return view('news/guestNews')->with('news', $news);
    }

    public function show(){

    }
}
