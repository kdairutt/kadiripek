<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $skills = Skill::orderBy('category')->orderBy('order')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');

        $request->validate([
            'name' => 'required',
            'category' => 'required',
        ]);

        Skill::create([
            'name' => $request->name,
            'category' => $request->category,
            'icon' => $request->icon,
            'order' => $request->order ?? 1,
        ]);

        return redirect('/admin/skills')->with('success', 'Beceri eklendi!');
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $skill = Skill::findOrFail($id);

        $skill->update([
            'name' => $request->name,
            'category' => $request->category,
            'icon' => $request->icon,
            'order' => $request->order ?? 1,
        ]);

        return redirect('/admin/skills')->with('success', 'Beceri güncellendi!');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        Skill::findOrFail($id)->delete();
        return redirect('/admin/skills')->with('success', 'Beceri silindi!');
    }
}