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
        $user = User::findOrFail($id);
        $input = $request->all();
        $valid_indicator = true;
        if (isset($input['name'])) {
            if (!preg_match("/^[a-zA-Z'-]+$/", $input['name'])) {
                $valid_indicator = false;
                Session::flash('error', 'Name must only contain alphabets');
            }
        }
        if (isset($input['phone'])) {
            if (!preg_match('/[0-9]/', $input['phone'])) {
                $valid_indicator = false;
                Session::flash('error', 'Phone number must only contain numerics');
            }
        }
        if ($valid_indicator) {
            if($file = $request->file('avatar')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $input['avatar'] = $name;
            }
            isset($request->password) ? $input['password'] = bcrypt($request->password) : $user->password;
            $user->update($input);
            return redirect('profile/'.$user->slug);
        } else {
            return redirect()->back();
        }
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
