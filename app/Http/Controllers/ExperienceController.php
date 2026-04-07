<?php

namespace App\Http\Controllers;

use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('order')->get();
        return view('experiences.index', compact('experiences'));
    }
}