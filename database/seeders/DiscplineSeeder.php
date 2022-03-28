<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplines = [
            ['discipline' => 'Nursing'],
            ['discipline' => 'English 101'],
            ['discipline' => 'Psychology'],
            ['discipline' => 'Computer science'],
            ['discipline' => 'Sociology'],
            ['discipline' => 'Accounting'],
            ['discipline' => 'Finance'],
            ['discipline' => 'Management'],
            ['discipline' => 'Marketing'],
            ['discipline' => 'International Relations'],
            ['discipline' => 'Logistics'],
            ['discipline' => 'Human Resources Managament (HTM)'],
            ['discipline' => 'Public relations'],
            ['discipline' => 'Antropology'],
            ['discipline' => 'Economics'],
            ['discipline' => 'Political Science'],
            ['discipline' => "Womens's & gender studies"],
            ['discipline' => 'Social work & human services'],
            ['discipline' => 'Cultural and Ethnic Studies'],
            ['discipline' => 'Tourism'],
            ['discipline' => 'Ethics'],
            ['discipline' => 'Urban Studies'],
            ['discipline' => 'Application Letters'],
            ['discipline' => 'Architecture, Building and Planning'],
            ['discipline' => 'Communications'],
            ['discipline' => 'Education'],
            ['discipline' => 'Family and consumer science'],
            ['discipline' => 'Law'],
            ['discipline' => 'Medicine'],
            ['discipline' => 'Technology'],
            ['discipline' => 'IT, Web'],
            ['discipline' => 'International Trade'],
            ['discipline' => 'Nursing'],
            ['discipline' => 'Criminal law'],
            ['discipline' => 'Environmental studies and Forestry'],
            ['discipline' => 'Health Care'],
            ['discipline' => 'Sports'],
            ['discipline' => 'Agriculture'],
            ['discipline' => 'Aviation'],
            ['discipline' => 'Civil Engineering'],
            ['discipline' => 'Criminal Justice'],
            ['discipline' => 'Engineering'],
            ['discipline' => 'Leadership Studies'],
            ['discipline' => 'Nutrition/Dietary'],
            ['discipline' => 'Public Administration'],
            ['discipline' => 'Medical Sciences (Anatomy, Physiology, Pharmacology)'],
            ['discipline' => 'Chemistry'],
            ['discipline' => 'Physics'],
            ['discipline' => 'Biology and other life sciences'],
            ['discipline' => 'Zoology'],
            ['discipline' => 'Geography'],
            ['discipline' => 'Astronomy (and other Space Sciences)'],
            ['discipline' => 'Ecology'],
            ['discipline' => 'Geology and other Earth Sciences'],
            ['discipline' => 'Classic English Literature'],
            ['discipline' => 'Film & Theater studies'],
            ['discipline' => 'History'],
            ['discipline' => 'Music'],
            ['discipline' => 'Philosophy'],
            ['discipline' => 'Religious studies'],
            ['discipline' => 'Shakespeare'],
            ['discipline' => 'Literature'],
            ['discipline' => 'Composition'],
            ['discipline' => 'Lingustics'],
            ['discipline' => 'Poetry'],
            ['discipline' => 'Arts (Fine arts, Performing arts)'],
            ['discipline' => 'Statistics'],
            ['discipline' => 'Mathematics'],
            ['discipline' => 'Humanities'],
            ['discipline' => 'Social Sciences'],
            ['discipline' => 'Business and administrative studies'],
            ['discipline' => 'Natural Sciences'],
            ['discipline' => 'Formal Sciences'],
            ['discipline' => 'Professional and Applied Sciences'],
            ['discipline' => 'Other'],
        ];
        DB::table('disciplines')->delete();
        DB::table('disciplines')->insert($disciplines);
    }
}
