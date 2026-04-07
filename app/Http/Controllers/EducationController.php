<?php

namespace App\Http\Controllers;

use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('order')->get();
        return view('educations.index', compact('educations'));
    }
}