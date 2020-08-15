<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');

    }
    public function showLoginForm()
    {

        return view('auth.admin-login');
    }

    public function login( Request $request)
    {
        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);



        //Attempt to log the user in

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)){

            //if successful log into their location

            return redirect()->intended(route('admin.dashboard'));
        }





        //if unsuccessful then redirect ro login form

        return redirect()->back()->withInput($request->only('email','remember'));
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
