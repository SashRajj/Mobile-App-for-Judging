<?php

namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Judge;
use App\Models\EventJudge;
use App\Models\Event;
use App\Models\Group;
use App\Models\GradingCriteria;
use App\Models\Score;

class JudgeController extends Controller
{
    public function index()
    {
        // Get the logged-in user
        $user = Auth::user();

        // Find the corresponding admin based on the user's ID
        $judge = Judge::where('user_id', $user->id)->first();

        // Fetch events created by the logged-in admin user
        $eventjudge = $judge ? EventJudge::where('JudgeID', $judge->JudgeID)->get() : collect();

        // Extract the EventIDs from the EventJudge collection
        $eventIDs = $eventjudge->pluck('EventID');

        // Fetch events based on the extracted EventIDs
        $events = Event::whereIn('EventID', $eventIDs)->get();

        return view('judge.dashboard', ['events' => $events]);
    }
    //add functionality
    public function showGradingCriteria($eventID)
    {
        // You can pass any necessary data to the view here

        $event = Event::findOrFail($eventID);
        $gradingCriteria = GradingCriteria::where('EventID', $eventID)->get();
        return view('judge.gradingcriteria', compact('event', 'gradingCriteria'));
    }
   
    public function show(Event $event)
    {
        // Get the logged-in user
        $user = Auth::user();
        // Find the corresponding admin based on the user's ID
        $judge = Judge::where('user_id', $user->id)->first();

        $judgeId = $judge->JudgeID;

        // Retrieve groups based on event id and judge id matching in the event judge table
        $groupsId = EventJudge::where('EventID', $event->EventID)
            ->where('JudgeID', $judgeId)
            ->pluck('GroupID')
            ->toArray();

        $groups = Group::whereIn('GroupID', $groupsId)->get();

        return view('judge.show', compact('event', 'groups'));
    }

    //shows all groups
    public function showGroups($eventID, $groupID)
    {
        $event = Event::findOrFail($eventID);
        $group = Group::findOrFail($groupID);
        $gradingCriteria = GradingCriteria::where('EventID', $eventID)->get();
        return view('judge.groups.show', compact('event', 'group', 'gradingCriteria'));
    }

    public function storeScores(Request $request, $eventID, $groupID){

        // Get the logged-in user
        $user = Auth::user();
        // Find the corresponding admin based on the user's ID
        $judge = Judge::where('user_id', $user->id)->first();

        $judgeID = $judge->JudgeID;

        $event = Event::findOrFail($eventID);
        $group = Group::findOrFail($groupID);

        $eventJudge = EventJudge::where('EventID', $eventID)
        ->where('GroupID', $groupID)
        ->where('JudgeID', $judgeID)
        ->first(); // Retrieve the actual model instance
    
    // Check if eventJudge exists
    if ($eventJudge) {
        $eventJudgeID = $eventJudge->EventJudgeID;}

        foreach ($request->scores as $gradingCriteriaID => $givenScore) {
            Score::create([
                'GradingCriteriaID' => $gradingCriteriaID,
                'EventJudgeID' => $eventJudgeID,
                'GivenScore' => $givenScore
            ]);
        }

        return redirect()->route('judge.show', ['event' => $event, 'group' => $group])->with('success', 'Score updated successfully.');
    }
}
