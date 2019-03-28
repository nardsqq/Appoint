<?php

namespace Appoint\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Appoint\User;
use Appoint\Models\{
    Booking,
    Event
};

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 0) {
            $bookings = Booking::orderBy('created_at', 'DESC')->paginate(5);
        } else if (Auth::user()->role == 1) {
            $bookings = Booking::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->paginate(5);
        }
        
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        $performers = User::where('role', 1)->get();

        return view('bookings.create', compact('events', 'performers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Booking::create($request->validate(Booking::$rules));

        return redirect()->route('bookings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $event = Event::find($booking->event_id);
        $performer = User::find($booking->user_id);

        return view('bookings.view', compact('booking', 'event', 'performer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $events = Event::all();
        $performers = User::where('role', 1)->get();

        return view('bookings.edit', compact('booking', 'events', 'performers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $event = Event::find($booking->event_id);
        $performer = User::find($booking->user_id);

        $booking->update($request->all());

        return view('bookings.view', compact('booking', 'event', 'performer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index');
    }
}
