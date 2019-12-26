<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use App\Directory;

class DirectoriesController extends Controller
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
        $directories = Directory::simplePaginate(4);
        return view('directories/index',
            compact('unreadNotifications'))
            ->with('directories', $directories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('directories/create');
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
            'name' => 'required',
            'location' => 'required',
            'description'  => 'required',
            'image' => 'image',
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
            $path = $request->file('image')->storeAs('public/directories', $fileNameToStore);
        }
        $directory = Directory::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
            'image' => $fileNameToStore,
        ]);

        return redirect('/directories');
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
        $directory = Directory::find($id);
        return view('directories/show')->with('directory', $directory);
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
        $directory = Directory::find($id);
        return view('directories/edit')->with('directory', $directory);
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
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'description'  => 'required',
        ]);
        $directory = Directory::find($id);
        $directory->name = $request->name;
        $directory->location = $request->location;
        $directory->description = $request->description;
        $directory->save();
        return redirect('/directories');
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
        $directory = Directory::find($id);
        $directory->delete();
        return redirect('/directories');
    }

    public function search(Request $request){
        $searchKey = $request->searchKey;
        $directories = Directory::search($searchKey)->paginate(15);
        return view('directories/index', compact('directories'));
    }
}
