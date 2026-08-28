<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use App\Models\Certificate;

class PortfolioController extends Controller
{
    public function index()
{
    $projects = Project::latest()->get();

    $experiences = Experience::latest()->get();

    $certificates = Certificate::latest()->get();

    return view(
        'portfolio.index',
        compact(
            'projects',
            'experiences',
            'certificates'
        )
    );
}
}