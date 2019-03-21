<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function show(User $user){
        $products = $user->products()->get();
        return view('profile/view', compact('user', 'products'));
    }

    public function edit(){
        $user = Auth::user();
        $user = User::findOrFail($user->id);
        return view('profile/edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('avatar')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['avatar'] = $name;
        }
        isset($request->password) ? $input['password'] = bcrypt($request->password) : $user->password;
        $user->update($input);
        return redirect('profile/'.$user->slug);
    }

    public function create_product(){
        return view('profile/add_product');
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
