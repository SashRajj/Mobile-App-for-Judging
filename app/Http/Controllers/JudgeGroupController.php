<?php

namespace App\Http\Controllers;

use App\Models\JudgeGroup;
use Illuminate\Http\Request;

class JudgeGroupController extends Controller
{
    public function index($judgeId)
    {
        // Retrieve judge groups for the given judge
        $judgeGroups = JudgeGroup::where('JudgeID', $judgeId)->get();

        // Return view with judge groups data
        return view('judges.groups.index', compact('judgeGroups', 'judgeId'));
    }

    public function store(Request $request, $judgeId)
    {
        // Validate the request
        $request->validate([
            'group_id' => 'required|exists:groups,id', // Assuming groups table has an 'id' column
        ]);

        // Create new judge group
        JudgeGroup::create([
            'JudgeID' => $judgeId,
            'GroupID' => $request->group_id,
        ]);

        // Redirect back to the judge groups page
        return redirect()->route('judges.groups.index', $judgeId)->with('success', 'Judge assigned to group successfully.');
    }
}
