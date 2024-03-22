<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\GradingCriteria;

class GradingCriteriaController extends Controller
{
    public function show(int $eventID)
    {
        // You can pass any necessary data to the view here

        $event = Event::findOrFail($eventID);
        $gradingCriteria = GradingCriteria::where('EventID', $eventID)->get();
        return view('events.gradingcriteria', compact('event', 'gradingCriteria'));
    }

    public function create($eventId)
    {
        return view('events.creategradingcriteria', compact('eventId'));
    }

    public function store(Request $request, $eventId)
{
    // Define validation rules
    $rules = [
        'Name' => 'required',
        'Description' => 'required',
        'MaxScore' => 'required|numeric',
    ];

    // Validate the request
    $request->validate($rules);

    // Create new grading criteria
    $gradingCriteriaData = [
        'EventID' => $eventId,
        'Name' => $request->Name,
        'Description' => $request->Description,
        'MaxScore' => $request->MaxScore,
    ];

    // Add AverageScore to the data if provided
    if ($request->has('AverageScore')) {
        $gradingCriteriaData['AverageScore'] = $request->AverageScore;
    }

    GradingCriteria::create($gradingCriteriaData);

    // Redirect back to the grading criteria page
    return redirect()->route('events.gradingcriteria', $eventId)->with('success', 'Grading criteria created successfully.');
}

    public function index($eventId)
    {
        $gradingCriteria = GradingCriteria::where('EventID', $eventId)->get();
        return view('events.gradingcriteria', compact('gradingCriteria'));
    }
}
