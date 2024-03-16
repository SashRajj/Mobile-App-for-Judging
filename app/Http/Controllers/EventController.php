<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);
        return view('events.index', ['events' => $events])->with(request()->input('page'));
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
        // Validate the request
        $request->validate([
            'Name' => 'required',
            'Description' => 'required',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after_or_equal:StartDate',
        ]);
    
        $user = Auth::user();
    
        // Find the corresponding admin based on the user's ID
        $admin = Admin::where('user_id', $user->id)->first();
        // Get the ID of the logged-in admin user
        $adminId = $admin->AdminID;
    
        // Create new Event with AdminID set
        Event::create([
            'AdminID' => $adminId,
            'Name' => $request->input('Name'),
            'Description' => $request->input('Description'),
            'StartDate' => $request->input('StartDate'),
            'EndDate' => $request->input('EndDate'),
        ]);
    
        // Give a friendly message
        return redirect()->route('admin.dashboard')->with('success', 'Event created successfully');
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
        // Validate the request
        $request->validate([
            'Name' => 'required',
            'Description' => 'required',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after_or_equal:StartDate',
        ]);

        // Update the Event
        $event->update($request->all());

        // Give a friendly message
        return redirect()->route('admin.dashboard')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // Delete the Event
        $event->delete();

        // Redirect and give a friendly message
        return redirect()->route('admin.dashboard')->with('success', 'Event deleted successfully');
    }
}
