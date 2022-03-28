<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\AcademicLevel;
use App\Models\Pricing;
use App\Models\Deadline;

class PricingController extends Controller
{
    public function getPricing()
    {
        $academicLevel = AcademicLevel::all()->map(function($level){
            return [
                'id' => $level->id, 
                'academic_level' => $level->academic_level, 
            ];
        });
        return Inertia::render('pricing',[
            'academic_levels' => $academicLevel
        ]);
    }
}
