<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use App\Models\Program;
use App\Models\Section;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $programs = Program::all();
        $sections = Section::all();

        return view('auth.register', [
            'programs' => $programs,
            'sections' => $sections,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // Add validation for section, program, and stud_id
    $request->validate([
        'fname' => ['required', 'string', 'max:255'],
        'lname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'program' => ['nullable', 'string'],  // Validate program
        'section' => ['nullable', 'string'],  // Validate section
        'stud_id' => ['required', 'string', 'unique:users'],  // Validate student ID (ensure it's unique)
        function ($attribute, $value, $fail) {
            if (!str_ends_with($value, '@fatima.edu.ph')) {
                $fail('The ' . $attribute . ' must be a Fatima email address.');
            }
        },
    ]);

    // Create the user with the new fields
    $user = User::create([
        'fname' => $request->fname,
        'lname' => $request->lname,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'program' => $request->program,  // Add program
        'section' => $request->section,  // Add section
        'stud_id' => $request->stud_id,  // Add student ID
    ]);

   // Trigger the registered event
    event(new Registered($user));

    // Log the user out before logging in again
    Auth::logout();

    // Log the user in again
    Auth::login($user);

    // Redirect to the login page (or any other page you'd like after logging out)
    return redirect(route('login', absolute: false));

    }

}
