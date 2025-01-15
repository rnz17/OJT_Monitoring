<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Column;

class ColumnController extends Controller
{
    public function index()
    {
        $files = Column::all();
        
        return view('admin.files', ['files' =>  $files]);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:text,file,number,date,boolean',
        ]);

        // Create a new dynamic column
        Column::create([
            'column_name' => $validated['name'],
            'column_type' => $validated['type']
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Dynamic column added successfully!');
    }

}
