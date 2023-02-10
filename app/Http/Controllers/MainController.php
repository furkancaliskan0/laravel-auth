<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importo lo "storage"
use Illuminate\Support\Facades\Storage;

use App\Models\Project;

class MainController extends Controller
{
    public function home()
    {
        $projects = Project::orderBy('created_at', 'DESC')->get();

        return view('pages.home', compact('projects'));
    }

    public function logged()
    {
        $projects = Project::orderBy('created_at', 'DESC')->get();

        return view('pages.logged', compact('projects'));
    }

    //SHOW:
    public function projectShow(Project $project)
    {
        return view('pages.project.show', compact('project'));
    }

    // Create Logged Private Single Content
    public function projectCreate()
    {

        return view('pages.project.create');

    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|min:3|max:64|unique:projects,name',
            'description' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|string|unique:projects,repo_link',
        ]);

        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;


        $project = Project::create($data);

        return redirect()->route('project.show', $project);
    }

    public function edit(Project $project)
    {

        return view('pages.project.edit', compact('project'));
    }
    public function update(Request $request, Project $project)
    {

        $data = $request->validate([
            'name' => 'required|string|min:3|max:64|unique:projects,name,' . $project->id,
            'description' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|string|unique:projects,repo_link,' . $project->id,
        ]);

        $project->update($data);
        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;

        return redirect()->route('project.show', $project);
    }

    public function delete(Project $project)
    {

        $project->delete();

        return redirect()->route('home');
    }
}