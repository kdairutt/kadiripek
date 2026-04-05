<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $educations = Education::orderBy('order')->get();
        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        return view('admin.educations.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');

        $request->validate([
            'type' => 'required',
            'school' => 'required',
            'department' => 'required',
            'start_year' => 'required',
        ]);

        Education::create([
            'type' => $request->type,
            'school' => $request->school,
            'department' => $request->department,
            'degree' => $request->degree,
            'start_year' => $request->start_year,
            'end_year' => $request->is_current ? null : $request->end_year,
            'is_current' => $request->has('is_current'),
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/admin/educations')->with('success', 'Eğitim başarıyla eklendi.');
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $education = Education::findOrFail($id);
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $education = Education::findOrFail($id);

        $education->update([
            'type' => $request->type,
            'school' => $request->school,
            'department' => $request->department,
            'degree' => $request->degree,
            'start_year' => $request->start_year,
            'end_year' => $request->is_current ? null : $request->end_year,
            'is_current' => $request->has('is_current'),
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/admin/educations')->with('success', 'Eğitim başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        Education::findOrFail($id)->delete();
        return redirect('/admin/educations')->with('success', 'Eğitim başarıyla silindi.');
    }
}