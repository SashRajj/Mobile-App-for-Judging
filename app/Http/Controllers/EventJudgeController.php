<?php

namespace App\Http\Controllers;

use App\Models\EventJudge;
use Illuminate\Http\Request;
use App\Models\Judge;
use App\Models\Group;
use App\Models\Event;

class EventJudgeController extends Controller
{
    public function index($eventID)
    {
        // Retrieve Judges
        $judges = Judge::all();
        
        // Retrieve groups in the event
        $groups = Group::where('EventID', $eventID)->get();

        // Return view with event judges data
        return view('events.judges.index', compact('judges', 'eventID', 'groups'));
    }

    public function show($eventID)
    {
        // Retrieve EventJudge data for the given event
        $eventJudges = EventJudge::where('EventID', $eventID)->get();
        $event = Event::findOrFail($eventID);
        // Pass the retrieved data to the view
        return view('events.judges.show', compact('eventJudges', 'eventID', 'event'));
    }

    public function store(Request $request, $eventID)
    {
        // Validate the request
        $request->validate([
            'judge_id' => 'required|exists:judges,JudgeID', // Assuming judges table has an 'id' column
            'group_id' => 'required|exists:groups,GroupID', // Assuming groups table has an 'id' column
        ]);

        // Create new event judge
        EventJudge::create([
            'EventID' => $eventID,
            'JudgeID' => $request->judge_id,
            'GroupID' => $request->group_id,
        ]);

        // Redirect back to the event judges page
        return redirect()->route('events.judges.show', $eventID)->with('success', 'Judge assigned to event successfully.');
    }
}
