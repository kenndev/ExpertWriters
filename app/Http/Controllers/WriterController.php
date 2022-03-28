<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WriterController extends Controller
{
    //Writer Dashboard
    public function Dashboard(){
        return Inertia::render('Writer/Dashboard');
    }

  
}
