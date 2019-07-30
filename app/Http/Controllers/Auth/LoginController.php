<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Socialite;
use Auth;
use App\Profile;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/the-hub';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $google_user = Socialite::driver('google')->user();
        $user = $this->userFindOrCreate($google_user);

        //login
        Auth::login($user, true);
        return redirect($this->redirectTo);
        // $user->token;
    }

    public function userFindOrCreate($google_user){
        $user = User::where('email', $google_user->email)->first();
        $random = Str::random(6);
        $slugCreate = Str::slug($google_user->getName(), '-');
        $slug = $slugCreate.$random;
        if(!$user){
            $user = new User;
            $user->name = $google_user->getName();
            $user->email = $google_user->getEmail();
            $user->provider_id = $google_user->getId();
            $user->slug = $slug;
            $user->avatar = "img-placeholder.png";
            $user->save();
            $id = $user->id;
        } elseif(!($user->provider_id)){
            $user->provider_id = $google_user->getId();
            $user->save();
        }

        return $user;
    }
}
