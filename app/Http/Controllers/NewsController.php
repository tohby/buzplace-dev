<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\News;
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
        //
        $news = News::simplePaginate(15);
        return view('news/index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('news/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $news = News::findOrFail($id);
        $facebook = $news->getShareUrl();
        $twitter = $news->getShareUrl('twitter');
        $whatsapp = $news->getShareUrl('whatsapp');
        $linkedin = $news->getShareUrl('linkedin');
        $pinterest = $news->getShareUrl('pinterest');
        $comments = $news->comment()->get();
        return view('news/news-item',
            compact('news', 'comments', 'twitter', 'whatsapp', 'facebook', 'linkedin', 'pinterest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeComment(Request $request) {
        $user = Auth::user();
        $data = [
            'news_id' => $request->news_id,
            'author' => $user->name,
            'photo' => $user->avatar,
            'body' => $request->body
        ];
        Comment::create($data);
        return redirect('/news/'.$request->news_id.'');
    }

    public function deleteComment($id){
        Comment::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function editComment($id, Request $request){
        $news = News::findOrFail($request->news_id);
        $comment = Comment::findOrFail($id);
        $comments = $news->comment()->get();
        return view('news/news-item', compact('comment', 'news', 'comments'));
    }

    public function updateComment(Request $request){
        $input = $request->all();
        $comment = Comment::findOrFail($request->comment_id);
        $comment->update($input);
        return redirect('/news/'.$request->news_id.'');
    }
}
