<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Program;
use App\Models\Section;

class SectionController extends Controller
{
    public function index()
{
    $IT = Section::where('section', 'like', 'IT%')->get();
    $CS = Section::where('section', 'like', 'CS%')->get();
    $EMC = Section::where('section', 'like', 'EMC%')->get();

    return view('admin.section', compact('IT', 'CS', 'EMC'));
}

public function view(Request $request){
    $sections = Section::all();

    $sorted = $sections->sortBy('section');

    return view('admin.editsec',[
        'sections' => $sorted,
    ]);
}

public function storesec(Request $request){
    
    $valid = $request->validate([
        'section' => 'required|string',
    ]);

    Section::create([
        'section' => $valid['section']
    ]);

    return redirect()->back()->with('success', 'Section added successfully!');
}

public function delete(Request $request){
    
    $request->validate([
        'id' => 'required|integer|exists:sections,id', // Ensure the ID exists in the 'columns' table
    ]);

    // Find the record by ID
    $section = Section::find($request->id);

    if ($section) {
        // Delete the record
        $section->delete();

        // Redirect back to the admin.files page with a success message
        return redirect()->route('admin.addsec')->with('success', 'Section deleted successfully.');
    } else {
        // Redirect back with an error message if the column was not found
        return redirect()->route('admin.addsec')->with('error', 'Section not found.');
    }

}



}
