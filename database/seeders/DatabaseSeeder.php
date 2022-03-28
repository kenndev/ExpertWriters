<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $roles = [
            ['role_name' => 'Admin'],
            ['role_name' => 'Writer'],
            ['role_name' => 'Customer']
        ];

        $type_paper = [
            ['paper_type' => 'Easy (any type)'],
            ['paper_type' => 'Admission essay'],
            ['paper_type' => 'Analysis (any type)'],
            ['paper_type' => 'Annotated bibliography'],
            ['paper_type' => 'Argumentative essays'],
            ['paper_type' => 'Article'],
            ['paper_type' => 'Article review'],
            ['paper_type' => 'Blog post'],
            ['paper_type' => 'Book/movie review'],
            ['paper_type' => 'Business plan'],
            ['paper_type' => 'Capstone project'],
            ['paper_type' => 'Case study'],
            ['paper_type' => 'Coursework'],
            ['paper_type' => 'Creative writing'],
            ['paper_type' => 'Critical thinking'],
            ['paper_type' => 'Discussion Essay'],
            ['paper_type' => 'Dissertation'],
            ['paper_type' => 'Journal article'],
            ['paper_type' => 'Lab report'],
            ['paper_type' => 'Literature Analysis/Review'],
            ['paper_type' => 'Memo/Letter'],
            ['paper_type' => 'Outline'],
            ['paper_type' => 'Personal reflection'],
            ['paper_type' => 'Poem'],
            ['paper_type' => 'Presentation/PPT'],
            ['paper_type' => 'Proofreading and Editing'],
            ['paper_type' => 'Question-Answer'],
            ['paper_type' => 'Reflection paper/ Reflection essay'],
            ['paper_type' => 'Report (any type)/Brief report'],
            ['paper_type' => 'Research paper'],
            ['paper_type' => 'Speech'],
            ['paper_type' => 'Summary'],
            ['paper_type' => 'Term paper'],
            ['paper_type' => 'Thesis/Thesis chapter'],
            ['paper_type' => 'Other']
        ];

        $academic_levels = [
            ['academic_level' => 'High School'],
            ['academic_level' => 'Undergrad. (yrs 1-2)'],
            ['academic_level' => 'Undergrad. (yrs 3-4)'],
            ['academic_level' => "Master's"],
            ['academic_level' => 'PhD']
        ];

        $deadlines = [
            ['deadline' => '14 days'],
            ['deadline' => '7 days'],
            ['deadline' => '5 days'],
            ['deadline' => '3 days'],
            ['deadline' => '48 days'],
            ['deadline' => '24 hours'],
            ['deadline' => '16 hours'],
            ['deadline' => '8 hours'],
            ['deadline' => '4 hours'],
            ['deadline' => '3 hours']
        ];

        DB::table('roles')->delete();
        DB::table('roles')->insert($roles);

        DB::table('paper_types')->delete();
        DB::table('paper_types')->insert($type_paper);

        DB::table('academic_levels')->delete();
        DB::table('academic_levels')->insert($academic_levels);

        DB::table('deadlines')->delete();
        DB::table('deadlines')->insert($deadlines);
    }
}
