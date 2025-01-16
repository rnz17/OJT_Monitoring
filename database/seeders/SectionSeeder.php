<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run()
    {
        Section::create(['section' => 'EMC4Y1-2']);
        Section::create(['section' => 'IT4Y2-3']);
        Section::create(['section' => 'IT4Y2-2']);
        Section::create(['section' => 'IT4Y2-1']);
        Section::create(['section' => 'CS4Y2-1']);
    }
}
