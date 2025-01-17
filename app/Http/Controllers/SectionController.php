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



}
