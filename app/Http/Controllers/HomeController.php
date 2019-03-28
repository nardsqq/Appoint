<?php

namespace Appoint\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Appoint\User;
use Appoint\Models\{
    Event,
    Booking
};


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
        $bookings = Booking::all();
        $events = Event::all();
        $performer_bookings = Booking::where('user_id', Auth::id())->get();

        return view('home', compact('performers', 'events', 'bookings', 'performer_bookings'));
    }
}
