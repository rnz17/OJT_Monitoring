<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        Program::create(['program' => 'CS']);
        Program::create(['program' => 'IT']);
        Program::create(['program' => 'EMC']);
    }
}

