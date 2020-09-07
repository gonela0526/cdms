<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Form;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //echo Form::label('email', 'E-Mail Address'); die();
        return view('admin');
    }
}
