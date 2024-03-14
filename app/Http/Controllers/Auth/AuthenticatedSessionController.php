<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Redirect based on user's role after login
        return $this->redirectTo(Auth::user()->role);
    }

    /**
     * Determine where to redirect users after login based on their role.
     *
     * @param string $role
     * @return RedirectResponse
     */
    protected function redirectTo(string $role): RedirectResponse
    {
        switch ($role) {
            case 'admin':
                return redirect('/admin/dashboard'); // Adjust the path as needed
            case 'judge':
                // Define where to redirect judges if needed
                return redirect('/judge/dashboard'); // Example path, adjust as needed
            case 'participant':
                // Define where to redirect participants if needed
                return redirect('/participant/dashboard'); // Example path, adjust as needed
            default:
                return redirect(RouteServiceProvider::HOME);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
