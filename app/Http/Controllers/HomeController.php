<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Home Dashboard
     * Also Clients functions
     */
    public function Dashboard()
    {
        return Inertia::render('Dashboard');
    }
}
