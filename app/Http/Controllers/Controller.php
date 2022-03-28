<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\AcademicLevel;
use App\Models\Deadline;

class Controller extends BaseController
{
  
    
    public const DEFAULT_ACADEMIC_LEVEL = 1;
    public const DEFAULT_DEADLINE = 1;
    public const PER_PAGE = 10;
    public const DEFAULT_SORT_FIELD = 'created_at';
    public const DEFAULT_SORT_ORDER = 'desc';
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
