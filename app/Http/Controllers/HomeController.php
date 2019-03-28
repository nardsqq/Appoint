<?php

namespace Appoint\Http\Controllers;

use Illuminate\Http\Request;

use Appoint\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $performers = User::where('role', 1)->get();

        return view('home', compact('performers'));
    }
}
