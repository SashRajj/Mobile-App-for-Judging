<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Group;
use App\Models\Project;

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
        $groups = $event->groups;
        return view('events.show', compact('event', 'groups'));
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

    //###########Group Management################

    public function createGroups(int $event)
    {
        $event = Event::findOrFail($event);
        return view('events.groups.create', compact('event'));

    }

    public function storeGroups(Request $request, Event $event)
{
    // Validate the incoming request data
    $request->validate([
        'Name' => 'required',
        'Title' => 'required',
        'Description' => 'required',
        'SubmissionLink' => 'required',
    ]);

    // Create a new project instance
    $project = new Project([
        'EventID' => $event->EventID, // Assign the EventID as the foreign key
        'Title' => $request->input('Title'),
        'Description' => $request->input('Description'),
        'SubmissionLink' => $request->input('SubmissionLink'),
        // Add other attributes if necessary
    ]);

    // Save the project to the database
    $project->save();

    // Create a new group instance
    $group = new Group([
        'Name' => $request->input('Name'),
        'ProjectID' => $project->ProjectID, // Assign the ProjectID as the foreign key
        'EventID' => $event->EventID,
        
        // Add other attributes if necessary
    ]);

    $group->save();

    // Save the group to the database
    $event->groups()->save($group);

    // Redirect back to the event show page with a success message
    return redirect()->route('events.show', $event->EventID)->with('success', 'Group created successfully.');
}

    public function editGroups(Event $event, Group $group)
    {
        return view('events.groups.edit', compact('event', 'group'));
    }

    public function updateGroups(Request $request, Event $event, Group $group)
    {
        // Add validation if necessary
        $request->validate([
            'Name' => 'required',
            'Title' => 'required',
            'Description' => 'required',
            'SubmissionLink' => 'required',
        ]);

        // Update the project
        $project = $group->project;
        $project->update([
            'Title' => $request->input('Title'),
            'Description' => $request->input('Description'),
            'SubmissionLink' => $request->input('SubmissionLink'),
        ]);

        $group->update([
            'Name' => $request->input('Name'),
        ]);

        return redirect()->route('events.show', $event->EventID)->with('success', 'Group updated successfully.');
    }

    public function showGroups(Event $event, Group $group)
    {
        return view('events.groups.show', compact('event', 'group'));
    }

    public function destroyGroups(Event $event, Group $group)
    {
        $group->delete();

        return redirect()->route('events.show', $event->EventID)->with('success', 'Group deleted successfully.');
    }
}
