<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['status' => 'Pending', 'color' => 'text-orange-500'],
            ['status' => 'Inprogress', 'color' => 'text-teal-500'],
            ['status' => 'Completed', 'color'=>'text-emerald-500'],
            ['status' => 'Overdue', 'color'=>'text-red-500'],
        ];
        DB::table('status')->delete();
        DB::table('status')->insert($status);
    }
}
