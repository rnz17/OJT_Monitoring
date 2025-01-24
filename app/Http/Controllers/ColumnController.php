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
            'type' => 'required|in:text,file',
        ]);

        // Create a new dynamic column
        Column::create([
            'column_name' => $validated['name'],
            'column_type' => $validated['type']
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Dynamic column added successfully!');
    }

    public function edit(Request $request)
    {
        // Validate the request to ensure an ID is provided
        $request->validate([
            'id' => 'required|integer|exists:columns,id', // Ensure 'id' exists in the 'columns' table
        ]);
    
        // Fetch the file record from the 'columns' table using the provided ID
        $file = Column::find($request->id);
    
        // Pass the file data to the 'admin.editfile' view
        return view('admin.editfile', compact('file'));
    }

    public function update(Request $request)
    {
        // Validate the request to ensure an ID is provided and the new data is valid
        $request->validate([
            'id' => 'required|integer|exists:columns,id', // Ensure 'id' exists in the 'columns' table
            'name' => 'required|string|max:255', // Add validation for 'name' (column name)
        ]);
        
        // Fetch the file record from the 'columns' table using the provided ID
        $file = Column::find($request->id);
        
        // Update the file record with new data
        $file->column_name = $request->name;  // Update the column name field with the new value

        // dd($file);
        
        // Save the changes to the database
        $file->save();
        
        // Redirect to a relevant page after the update, e.g., back to the file list with a success message
        return redirect()->route('admin.files')->with('success', 'Column updated successfully.');
    }
    
    

    public function delete(Request $request)
    {
        // Validate the request to ensure an ID is provided
        $request->validate([
            'id' => 'required|integer|exists:columns,id', // Ensure the ID exists in the 'columns' table
        ]);
    
        // Find the record by ID
        $column = Column::find($request->id);
    
        if ($column) {
            // Delete the record
            $column->delete();
    
            // Redirect back to the admin.files page with a success message
            return redirect()->route('admin.files')->with('success', 'Column deleted successfully.');
        } else {
            // Redirect back with an error message if the column was not found
            return redirect()->route('admin.files')->with('error', 'Column not found.');
        }
    }
    

}
