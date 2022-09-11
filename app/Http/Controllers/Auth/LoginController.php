<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Session;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/bbs';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Login controller and redirect based on user role
    public function login(Request $request)
    {
        
        // $validation = $request->validate([
        //     'username' => 'required',
        //     'password' => 'required|min:6',
        // ]);
         
        $validation = Validator::make($request->all(),
        [ 
            'username' => ['required'],
            'password' => ['required','min:6'],
        ]);

        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors($validation);
        }

        if (Auth::attempt(['email'=>$request->username,'password'=>$request->password]) or Auth::attempt(['mobile'=>$request->username,'password'=>$request->password]))
        {
            if(auth()->user()->status == 1)
            {
                if (auth()->user()->role_id) 
                {
                    return redirect()->route('admin.index');
                }else {
                    // Session::flush();
                    Auth::logout();
                    return redirect()->back()->with('error', 'You Dont have any user role');
                    
                }
            }else{
                // Session::flush();
                Auth::logout();
                return redirect()->back()->with('error', 'Invalid user..!');
            }

        } else {
            return redirect()->back()->with('error', 'Email or Phone or Password is invalid');
        }

    }

}
