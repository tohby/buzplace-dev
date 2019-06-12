<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Posts::paginate(15);
        foreach ($posts as $post) {
            $facebook = $post->getShareUrl();
            $twitter = $post->getShareUrl('twitter');
            $linkedin = $post->getShareUrl('linkedin');
        }
        return view('the-hub/index', compact('posts', 'facebook', 'twitter', 'linkedin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('the-hub.create');
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
        $input = $request->all();
        $user = Auth::user();
        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = 'images/'.$name;
        }
        $user->posts()->create($input);
        Session::flash('post_message', 'Your post has been created successfully');
        return redirect()->back();
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
        $posts = Posts::findBySlugOrFail($slug);
        $facebook = $posts->getShareUrl();
        $twitter = $posts->getShareUrl('twitter');
        $whatsapp = $posts->getShareUrl('whatsapp');
        $linkedin = $posts->getShareUrl('linkedin');
        $pinterest = $posts->getShareUrl('pinterest');
        return view('the-hub.show',
            compact('posts', 'facebook', 'twitter', 'whatsapp', 'linkedin', 'pinterest'));
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
