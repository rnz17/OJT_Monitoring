<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'column' => 'required',
            'file' => 'required|file|mimes:jpg,png,pdf,doc,docx|max:3048', // Adjust MIME types and max size as needed
        ]);

        $user = Auth::user()->stud_id;
        $column = $request->input('column');
        $file = $request->file('file');

        // Store the file in the public/files directory
        $fileName = Auth::user()->stud_id . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('files', $fileName, 'public');


        // Save file details in the database
        File::create([
            'student_id' => $user,
            'column_id' => $column,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }


}
