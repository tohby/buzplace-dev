<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\PostImages;
use Illuminate\Support\Facades\Session;

class HubController extends Controller
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
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(12);
        foreach ($posts as $post) {
            $facebook = $post->getShareUrl();
            $twitter = $post->getShareUrl('twitter');
            $linkedin = $post->getShareUrl('linkedin');
        }
        return view('the-hub/index',
            compact('posts',
                'unreadNotifications'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('the-hub.create');
        //now uses modal for this function
        // return view('the-hub.create');
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
            'title' => 'required',
            'image.*' => 'image|nullable|mimes:jpeg,png',
            'description'  => 'required',
        ]);
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('description'),
        ]);
        //get file name with the extension
        if($request->hasFile('image')){
                foreach ($request->file('image') as $image) {
                $fileNameWithExt = $image->getClientOriginalName();
                //get just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //get extension
                $extension = $image->getClientOriginalExtension();
                //filename to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                //image upload
                $path = $image->storeAs('public/post_images', $fileNameToStore);
                $post_image = PostImages::create([
                    'post_id' => $post->id,
                    'image' => $fileNameToStore,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Your Post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $post = Post::findBySlugOrFail($slug);
        return view('the-hub.show', compact('post'));
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
}
