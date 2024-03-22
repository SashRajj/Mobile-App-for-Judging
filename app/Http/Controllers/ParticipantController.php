<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Group;
use App\Models\Event;


class ParticipantController extends Controller
{
    public function create($eventID) {
        // Find the event by ID
        $event = Event::findOrFail($eventID);
        return view('events.participants.create', compact('eventID'));
    }

    public function show($eventID) {
        // Find the event by ID
        $event = Event::findOrFail($eventID);
    
        // Retrieve all groups for the given event
        $groups = Group::where('EventID', $eventID)->get();
    
        // Get the GroupIDs from the fetched groups
        $groupIDs = $groups->pluck('GroupID')->toArray();
    
        // Retrieve all participants matching the GroupIDs
        $participants = Participant::whereIn('GroupID', $groupIDs)->get();
    
        // Return the event, groups, and participants to the view
        return view('events.participants.show', compact('eventID', 'event', 'groups', 'participants'));
    }
    
    public function index($eventID)
    {
        // Retrieve Judges
        $participants = Participant::all();
        
        // Retrieve groups in the event
        $groups = Group::where('EventID', $eventID)->get();

        // Return view with event judges data
        return view('events.participants.create', compact('participants', 'eventID', 'groups'));
    }

    public function store(Request $request, $eventID)
    {
        // Define validation rules
    $rules = [
        'Name' => 'required',
        'Email' => 'required',
        'GroupID' => 'required|numeric',
    ];

    // Validate the request
    $request->validate($rules);

    // Create new grading criteria
    $participant = [
        'Name' => $request->Name,
        'Email' => $request->Email,
        'GroupID' => $request->GroupID,
    ];

    Participant::create($participant);

    // Redirect back to the grading criteria page
    return redirect()->route('events.participants.show', $eventID)->with('success', 'Grading criteria created successfully.');
    }
    
}
