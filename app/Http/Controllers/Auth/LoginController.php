<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    public function login(Request $request)
    {
        $credentials = array('username'=>$request['username'],'password'=>$request['password']);

        if (Auth::attempt($credentials)) {

            return Redirect::to('/');

            
        }else{
            $error = "Username ou mot de passe incorrecte";
            return view('auth.login',['error'=>$error]);
        }
    }
    public function logout(){
        Auth::logout();
        Session()->flush();
        return Redirect::to('/login');
    }
}
