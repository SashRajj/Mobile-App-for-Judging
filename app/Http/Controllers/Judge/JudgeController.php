<?php

namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Judge;
use App\Models\EventJudge;
use App\Models\Event;

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
}
