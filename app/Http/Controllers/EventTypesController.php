<?php

namespace Appoint\Http\Controllers;

use Illuminate\Http\Request;

use Appoint\Models\EventType;

class EventTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_types = EventType::orderBy('created_at', 'DESC')->paginate(5);

        return view('event_types.index', compact('event_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EventType::create($request->validate(EventType::$rules));

        return redirect()->route('event-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  EventType $event_type
     * @return \Illuminate\Http\Response
     */
    public function show(EventType $event_type)
    {
        return view('event_types.view', compact('event_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EventType $event_type
     * @return \Illuminate\Http\Response
     */
    public function edit(EventType $event_type)
    {
        return view('event_types.edit', compact('event_type'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  EventType $event_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventType $event_type)
    {
        $event_type->update($request->validate(EventType::$rules));

        return view('event_types.view', compact('event_type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventType $event_type)
    {
        $event_type->delete();

        return redirect()->route('event-types.index');
    }
}
