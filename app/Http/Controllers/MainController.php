<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class MainController extends Controller
{
    public function home()
    {
        $projects = Project::all();

        return view('pages.home', compact('projects'));
    }

    public function logged()
    {
        return view('pages.logged');
    }
}