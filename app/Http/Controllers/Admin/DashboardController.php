<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Experience;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $totalExperiences = Experience::count();

        return view(
            'admin.dashboard',
            compact('totalProjects', 'totalExperiences')
        );
    }
}