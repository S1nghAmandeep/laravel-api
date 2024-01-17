<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        // $projects = Project::all();
        $projects = Project::with('category', 'technologies')->paginate(12);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show(Project $project)
    {

        $project->load('category', 'technologies');

        return response()->json([
            'success' => 'true',
            'results' => $project
        ]);
    }
}
