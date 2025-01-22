<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        // Validate the input
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', function ($attribute, $value, $fail) use ($request) {  // Use $request here
                // Check if the current password matches the stored password
                if (!Hash::check($value, $request->user()->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
    
        // Update the user's password
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
    
        // Redirect back with a success message
        return back()->with('status', 'password-updated');
    }
}
