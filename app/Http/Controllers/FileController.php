<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use App\Models\Column;

class FileController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'column' => 'required',
            'dynamic-input' => 'required_without:file', // Ensure either dynamic input or file is provided
            'file' => 'required_without:dynamic-input|file|mimes:jpg,png,pdf,doc,docx|max:3048', // Adjust MIME types and max size as needed
        ]);
    
        $user = Auth::user()->stud_id;
        $column = $request->input('column');
        $columnType = Column::find($column)->column_type; // Assuming you have a `Column` model to get `column_type`
    
        $content = null;
        
        if ($columnType === 'file') {
            // Handle file uploads
            $file = $request->file('file');
            $fileName = $user . '_' . $file->getClientOriginalName();
            $content = $file->storeAs('files', $fileName, 'public'); // Save the file path in the `content` column
        } elseif ($columnType === 'text') {
            // Handle text inputs
            $content = $request->input('dynamic-input'); // Save the text input directly in the `content` column
        } else {
            return redirect()->back()->with('error', 'Invalid column type selected.');
        }
        // Save details in the database
        File::create([
            'student_id' => $user,
            'column_id' => $column,
            'content' => $content, // Save either file path or text input here
        ]);
    
        return redirect()->back()->with('success', $columnType === 'file' ? 'File uploaded successfully.' : 'Text input saved successfully.');
    }

}
