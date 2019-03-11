<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/home';

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
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();

    }*/

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();
        //return $userSocial->getId();
        //return $userSocial->getName();
        $findUser = User::where('email', $userSocial->email)->first();
        if ($findUser) {
            Auth::login($findUser);
            return "done with old";
        } else {
            $user           = new User;
            $user->name     = $userSocial->name;
            $user->email    = $userSocial->email;
            $user->password = bcrypt(123456);
            $user->save();
            Auth::login($user);
            return "done with new";
        }
    }*/


    /**
     * Redirect the user to the twitter authentication page.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }*/

    /**
     * Obtain the user information from twitter.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('twitter')->user();
        //return $user->name;
        //return $userSocial->getEmail();
        $findUser = User::where('email', $userSocial->email)->first();
        if ($findUser) {
            Auth::login($findUser);
            return "done with old";
        } else {
            $user           = new User;
            $user->name     = $userSocial->name;
            $user->email    = $userSocial->email;
            $user->password = bcrypt(123456);
            $user->save();
            Auth::login($user);
            return "done with new";
        }
    }*/

    
    /**
     * Redirect the user to the google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }*/

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('google')->stateless()->user();
        //return $userSocial->name;
        //return $userSocial->getEmail();
        
        $findUser = User::where('email', $userSocial->email)->first();
        if ($findUser) {
            Auth::login($findUser);
            return "done with old";
        } else {
            $user           = new User;
            $user->name     = $userSocial->name;
            $user->email    = $userSocial->email;
            $user->password = bcrypt(123456);
            $user->save();
            Auth::login($user);
            return "done with new";
        }
    }*/

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        if ($provider == 'twitter') {
            $user = Socialite::driver('twitter')->user();
        } elseif($provider == 'facebook') {
            $user = Socialite::driver('facebook')->user();            
        }else{
            $user = Socialite::driver('google')->stateless()->user();
        }       
                
        $findUser = User::where('email', $user->email)->first();
        if ($findUser) {
            Auth::login($findUser);            
        } else {
            $newuser           = new User;
            $newuser->name     = $user->name;
            $newuser->email    = $user->email;
            $newuser->password = bcrypt(123456);
            $newuser->save();
            Auth::login($newuser);            
        }
        return redirect('home');
    }

}
