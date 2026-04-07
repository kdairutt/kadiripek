<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->take(3)->get();
        $skills = Skill::orderBy('category')->orderBy('order')->get();
        $experiences = Experience::orderBy('order')->take(3)->get();
        $stats = [
            'projects' => Project::count(),
            'experiences' => Experience::count(),
            'certificates' => Certificate::count(),
        ];

        return view('home', compact('projects', 'skills', 'experiences', 'stats'));
    }
}