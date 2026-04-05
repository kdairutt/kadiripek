<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index() {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $experiences = Experience::orderBy('order')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $request->validate([
            'company' => 'required',
            'role' => 'required',
            'start_date' => 'required',
        ]);

        Experience::create([
            'company' => $request->company,
            'role' => $request->role,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->is_current ? null : $request->end_date,
            'is_current' => $request->has('is_current'),
            'order' => $request->order ?? 0,
        ]);

        return redirect('/admin/experiences')->with('success', 'Deneyim başarıyla eklendi.');
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $experience = Experience::findOrFail($id);
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $experience = Experience::findOrFail($id);

        $experience->update([
            'company' => $request->company,
            'role' => $request->role,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->is_current ? null : $request->end_date,
            'is_current' => $request->has('is_current'),
            'order' => $request->order ?? 0,
        ]);

        return redirect('/admin/experiences')->with('success', 'Deneyim başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        Experience::findOrFail($id)->delete();
        return redirect('/admin/experiences')->with('success', 'Deneyim başarıyla silindi.');
    }
}
