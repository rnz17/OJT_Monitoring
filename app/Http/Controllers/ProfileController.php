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
use App\Models\Section;
use App\Models\Program;

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



    public function table(Request $request)
    {
        // Fixed columns
        $staticColumns = ['stud_id', 'name', 'program', 'section', 'email', 'acad_yr'];

        // Fetch dynamic columns from the database
        $dynamicColumns = \App\Models\Column::pluck('column_name')->toArray();

        // Merge static and dynamic columns
        $columns = array_merge($staticColumns, $dynamicColumns);

        // Start query for users (students)
        $query = \App\Models\User::select($staticColumns)->where('professor', 0);

        // Search filter: Apply search condition if a search term is provided
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('stud_id', 'like', "%$searchTerm%")
                ->orWhere('name', 'like', "%$searchTerm%")
                ->orWhere('section', 'like', "%$searchTerm%")
                ->orWhere('email', 'like', "%$searchTerm%");
            });
        }

        // Program filter: Apply program filter if a program is selected
        if ($request->has('program') && $request->program != '') {
            $query->where('program', $request->program);
        }

        // Section filter: Apply section filter if a section is selected
        if ($request->has('section') && $request->section != '') {
            $query->where('section', $request->section);
        }

        // Fetch filtered users
        $users = $query->get();

        // Fetch all programs and sections for the filter options
        $programs = Program::all();
        $sections = Section::all();

        // Return the view with users and filter data
        return view('admin.dashboard', [
            'users' => $users,
            'columns' => $columns,
            'programs' => $programs,
            'sections' => $sections,
            'search' => $request->search,
            'programFilter' => $request->program,
            'sectionFilter' => $request->section
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
