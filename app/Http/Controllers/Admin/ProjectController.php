<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $projects = Project::orderBy('order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $imagePath,
            'url' => $request->url,
            'github_url' => $request->github_url,
            'order' => $request->order ?? 1,
        ]);

        return redirect('/admin/projects')->with('success', 'Proje başarıyla eklendi.');
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $project = Project::findOrFail($id);

        $imagePath = $project->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $imagePath,
            'url' => $request->url,
            'github_url' => $request->github_url,
            'order' => $request->order ?? 1,
        ]);

        return redirect('/admin/projects')->with('success', 'Proje başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        Project::findOrFail($id)->delete();
        return redirect('/admin/projects')->with('success', 'Proje başarıyla silindi.');
    }
}