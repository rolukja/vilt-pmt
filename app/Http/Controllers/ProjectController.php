<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index(): \Inertia\Response
    {

        return Inertia::render('Project/Index', [
            'projects' => Project::all(),
        ]);
    }
}
