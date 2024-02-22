<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);

        return view('events.index', compact('events'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        //create new Event
        Event::create($request->all());

        //give a friendly message
        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //validate the request
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        //update the Event
        $event->update($request->all());

        //give a friendly message
        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //delete the Event
        $event->delete();

        //redirect and give a friendly message
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
}
