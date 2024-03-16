<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Get the logged-in user
        $user = Auth::user();

        // Find the corresponding admin based on the user's ID
        $admin = Admin::where('user_id', $user->id)->first();

        // Fetch events created by the logged-in admin user
        $events = $admin ? Event::where('AdminID', $admin->AdminID)->get() : collect();

        return view('admin.dashboard', ['events' => $events]);
    }

}
