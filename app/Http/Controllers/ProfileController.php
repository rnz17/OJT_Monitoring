<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Column;
use App\Models\User;
use App\Models\File;

class ProfileController extends Controller
{

    public function persoTable()
    {
        // Static columns
        $staticColumns = ['stud_id', 'name', 'program', 'section', 'email', 'acad_yr'];

        // Fetch dynamic columns from the database
        $dynamicColumns = Column::pluck('column_name')->toArray();

        // Merge static and dynamic columns
        $columns = array_merge($staticColumns, $dynamicColumns);

        // get files
        $files = Column::all();

        // Fetch the authenticated user's data
        $user = User::select($staticColumns)
            ->where('stud_id', Auth::user()->stud_id)
            ->first();

        // Initialize $done and $todo arrays
        $done = [];
        $todo = [];

        // Check each dynamic column value for the user
        foreach ($dynamicColumns as $column) {
            // Assume these dynamic column values are stored in the `columns` table and check file_path
            $columnRecord = Column::where('id', $column)->first(); // Get the column record by column ID
            
            // Check if file_path in the column record is not null
            if ($columnRecord && $columnRecord->file_path !== null) {
                $done[] = $column; // Add to $done if file_path is not null
            } else {
                $todo[] = $column; // Add to $todo if file_path is null
            }
        }


        return view('client.dashboard', [
            'user' => $user,
            'columns' => $columns,
            'files' => $files,
            'done' => $done,
            'todo' => $todo
        ]);
    }



    public function table()
    {
        // Fixed columns
        $staticColumns = ['stud_id', 'name', 'program', 'section', 'email', 'acad_yr'];

        // Fetch dynamic columns from the database
        $dynamicColumns = \App\Models\Column::pluck('column_name')->toArray();

        // Merge static and dynamic columns
        $columns = array_merge($staticColumns, $dynamicColumns);

        // Fetch users with only the static columns (adjust for dynamic column handling if needed)
        $users = \App\Models\User::select($staticColumns)->where('professor', 0)->get();

        return view('admin.dashboard', [
            'users' => $users,
            'columns' => $columns
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('admin.profile')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
