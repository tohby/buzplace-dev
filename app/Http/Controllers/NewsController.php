<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notification;
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
    public function index(Request $request, Notification $notification)
    {
        //
        $unreadNotifications = $this->notifications($request, $notification);
        $news = News::simplePaginate(15);
        return view('news/index',
            compact('unreadNotifications'))->with('news', $news);
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
        $this->validate($request, [
            'headline' => 'required',
            'image' => 'required|image|max:10000',
            'content'  => 'required',
        ]);
        if($request->hasFile('image')){
            //get file name with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //image upload
            $path = $request->file('image')->storeAs('public/news-images', $fileNameToStore);
        }else {
            $fileNameToStore = "noSubmission";
        }
        $news = News::create([
            'headline' => $request->input('headline'),
            'content' => $request->input('content'),
            'image' => $fileNameToStore,
        ]);

        return redirect('/news')->with('success', 'The post has been created');
        // return $news;
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
