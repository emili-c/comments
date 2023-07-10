<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('welcome');
    }
    public function adminLogin()
    {
        return view('auth.login',['is_admin'=>1]);
    }
    public function customerLogin()
    {
        return view('auth.login',['is_admin'=>0]);
    }
    public function verifyLogin(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'password' => 'required|min:6',
        ]);
        if($req->key == 1)
        {
        if (\Auth::guard('admin')->attempt($req->only(['name', 'password']), $req->get('remember'))) {
            return redirect('/admin/dashboard')->with('is_admin', $req->key);
            exit();
        }
    }
        else
        {
            if (\Auth::guard('customer')->attempt($req->only(['name', 'password']), $req->get('remember'))) {
            return redirect('/customer/dashboard')->with('is_admin', $req->key);
            exit();
        }
        }
        return back()->withInput($req->only('name', 'remember'));
    }
    public function logout()
    {
        Session::flush();
        
        Auth::guard('admin')->logout();
        Auth::guard('customer')->logout();
        Auth::logout();

        return redirect('/');
    }
}
