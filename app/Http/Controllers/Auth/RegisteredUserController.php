<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:admin,judge,participant'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect based on user role
        return $this->redirectTo($user->role);
    }

    /**
     * Determine where to redirect users after registration based on their role.
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
}
