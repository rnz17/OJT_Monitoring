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


    public function updateEnrollment(Request $request)
    {
        // Find the user by their student ID
        $user = User::where('stud_id', $request->user_id)->first();

        
        // Check if user exists
        if ($user) {
            $user->enrolled = $request->status; 
            
            $user->save();
            
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'User not found']);
    }

    public function account(){
        $sections = Section::all();

        return view('client.account',[
            'sections' => $sections
        ]);
    }

    public function persoTable()
    {
        // Static columns
        $staticColumns = ['stud_id', 'fname', 'lname', 'program', 'section', 'email', 'acad_yr'];

        // Fetch dynamic columns from the database (getting only the column_name)
        $dynamicColumns = Column::pluck('column_name')->toArray();

        // Merge static and dynamic columns
        $columns = array_merge($staticColumns, $dynamicColumns);

        // Get files (we'll use this for fetching data from the `files` table)
        $files = File::all();

        $fileUp = Column::all();

        // Fetch the authenticated user's data
        $user = User::select($staticColumns)
            ->where('stud_id', Auth::user()->stud_id)
            ->first();

        // Initialize $done and $todo arrays
        $done = [];
        $todo = [];

        // Check each dynamic column value for the user
        foreach ($dynamicColumns as $columnName) {
            // Find the column record from the `columns` table by the column_name
            $column = Column::where('column_name', $columnName)->first();
            // dd($column);
            if ($column) {
                $append = 0;
                // Now find the corresponding file record in the `files` table using the column's id
                $fileRecord = File::where('column_id', $column->id)->get();
                // Check if file_record exists and if content is not null
                if ($fileRecord) {
                    foreach($fileRecord as $file){
                        if ($file->student_id == Auth::User()->stud_id){
                            $done[] = $file->content;
                            $append = 1;
                        }
                    }
                    if ($append == 0){
                        $todo[] = $column->column_name;
                    }
                }
            }
        }


        // Return the view with the necessary data
        return view('client.dashboard', [
            'user' => $user,
            'columns' => $columns,
            'files' => $files,
            'fileUp' => $fileUp,
            'done' => $done,
            'todo' => $todo
        ]);
    }

    public function table(Request $request)
    {
        // Fixed columns
        $staticColumns = ['enrolled', 'stud_id', 'lname', 'fname', 'program', 'section', 'email', 'acad_yr'];
    
        // Fetch dynamic columns from the database (with column names only)
        $dynamicColumns = Column::pluck('column_name')->toArray();
    
        // Merge static and dynamic columns
        $columns = array_merge($staticColumns, $dynamicColumns);
    
        // Start query for users (students)
        $query = User::select($staticColumns);
    
        // Search filter: Apply search condition if a search term is provided
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('stud_id', 'like', "%$searchTerm%")
                    ->orWhere('fname', 'like', "%$searchTerm%")
                    ->orWhere('lname', 'like', "%$searchTerm%")
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

        // Program filter: Apply program filter if a program is selected
        if ($request->has('acad_yr') && $request->acad_yr != '') {
            $query->where('acad_yr', $request->acad_yr);
        }
        
        // Program filter: Apply program filter if a program is selected
        if ($request->has('program') && $request->program != '') {
            $query->where('program', $request->program);
        }
    
        // Sorting by Last Name (lname)
        if ($request->has('sort') && $request->sort != '') {
            if ($request->sort == 'lna') {
                $query->orderBy('lname', 'asc'); // Last Name Ascending
            } elseif ($request->sort == 'lnd') {
                $query->orderBy('lname', 'desc'); // Last Name Descending
            }
        }
    
        // Fetch users (students)
        $users = $query->where('professor', 0)->get();
    
        // Loop through each user to fetch file paths for dynamic columns
        foreach ($users as $user) {
            // Loop through dynamic columns and add content for each column
            foreach ($dynamicColumns as $columnName) {
                // Get the column_id for the current dynamic column name
                $column = Column::where('column_name', $columnName)->first();
                if ($column) {
                    // Get the file associated with the dynamic column and student (matching stud_id)
                    $file = File::where('column_id', $column->id)
                                ->where('student_id', $user->stud_id) // Match student_id with stud_id
                                ->first();
    
                    // If a file exists, assign the content to the dynamic column of the user
                    $user->$columnName = $file ? $file->content : null;
                }
            }
        }
    
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
            'sectionFilter' => $request->section,
            'sortFilter' => $request->sort // Add this for keeping the selected sort option
        ]);
    }
    
    public function sections($id)
    {
        // Fixed columns
        $staticColumns = ['stud_id', 'fname', 'lname', 'program', 'section', 'email', 'acad_yr'];
    
        // Fetch dynamic columns from the database (with column names only)
        $dynamicColumns = Column::pluck('column_name')->toArray();
    
        // Merge static and dynamic columns
        $columns = array_merge($staticColumns, $dynamicColumns);

        // Fetch users where the 'section' column matches the provided $id
        $users = User::where('section', $id)->where('professor', 0)->get();
        
        // Loop through each user to fetch file paths for dynamic columns
        foreach ($users as $user) {
            // Loop through dynamic columns and add content for each column
            foreach ($dynamicColumns as $columnName) {
                // Get the column_id for the current dynamic column name
                $column = Column::where('column_name', $columnName)->first();
                if ($column) {
                    // Get the file associated with the dynamic column and student (matching stud_id)
                    $file = File::where('column_id', $column->id)
                                            ->where('student_id', $user->stud_id) // Match student_id with stud_id
                                            ->first();
    
                    // If a file exists, assign the content to the dynamic column of the user
                    $user->$columnName = $file ? $file->content : null;
                }
            }
        }

        // dd($user);

        // Return a view with the filtered users
        return view('admin.filtered', [
            'users' => $users,
            'columns' => $columns,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.account', [
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


        if (Auth::user()->professor == 0){
            return Redirect::route('client.profile')->with('status', 'profile-updated');
            
        }else{
            return Redirect::route('admin.profile')->with('status', 'profile-updated');
        }
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
