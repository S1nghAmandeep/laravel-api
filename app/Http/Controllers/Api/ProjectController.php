<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:50|string|',
            'description' => 'nullable|string',
            'technologies' => 'exists:technologies,id',
            'cover_image' => 'nullable|max:2048|file'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');

        if ($request->has('cover_image')) {
            $img_path = Storage::put('upload', $request->cover_image);

            $data['cover_image'] = $img_path;
        }

        $new_project = Project::create($data);

        if ($request->has('technologies')) {
            $new_project->technologies()->attach($data['technologies']);
        }

        if ($new_project) {

            return response()->json([
                'status' => 200,
                'message' => $new_project
            ], 200);
        } else {

            return response()->json([
                'status' => 500,
                'message' => 'failed'
            ], 500);
        }
    }
}
