<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Products;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mockery\Matcher\Not;

class ProfileController extends Controller
{
    //
    public function show(User $user, Request $request, Notification $notification){
        $unreadNotifications = $this->notifications($request, $notification);
        $products = $user->products()->paginate(11);
        return view('profile/view',
            compact('user', 'products', 'unreadNotifications'));
    }

    public function edit(Request $request, Notification $notification){
        $unreadNotifications = $this->notifications($request, $notification);
        $user = Auth::user();
        $user = User::findOrFail($user->id);
        return view('profile/edit',
            compact('user', 'unreadNotifications'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'image'
        ]);
        if($request->hasFile('avatar')){
            //get file name with the extension
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //image upload
            $path = $request->file('avatar')->storeAs('public/user-images', $fileNameToStore);
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->description = $request->description;
        $user->location = $request->location;
        $user->website = $request->website;
        $user->phone = $request->phone;
        $user->businessName = $request->businessName;
        $user->avatar = $fileNameToStore;
        $user->save();
    }
    
    public function create_product(Request $request, Notification $notification){
        $unreadNotifications = $this->notifications($request, $notification);
        return view('profile/add_product',
            compact('unreadNotifications'));
    }

    public function store_product(Request $request){
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('image')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;
        }
        $user->products()->create($input);
        return redirect('profile/'.$user->slug);
    }
}
