<?php

namespace Appoint\Http\Controllers;

use Illuminate\Http\Request;

use Appoint\Models\{
    Event,
    Client,
    EventType
};
use Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'DESC')->paginate(5);

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $event_types = EventType::all();

        return view('events.create', compact('event_types', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newDate =  \Carbon\Carbon::createFromFormat('Y-m-d\TH:i',$request->date_time);
        $request->merge(['date_time' => $newDate]);
        Event::create($request->validate(Event::$rules));

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $client = Client::find($event->client_id);
        $event_type = EventType::find($event->event_type_id);
        
        return view('events.view', compact('event', 'event_type', 'client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $clients = Client::all();
        $event_types = EventType::all();

        return view('events.edit', compact('event', 'event_types', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $client = Client::find($event->client_id);
        $event_type = EventType::find($event->event_type_id);

        $newDate =  \Carbon\Carbon::createFromFormat('Y-m-d\TH:i',$request->date_time);
        $request->merge(['date_time' => $newDate]);

        $event->update($request->all());

        return view('events.view', compact('event', 'event_type', 'client'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index');
    }
}
