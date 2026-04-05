<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $certificates = Certificate::orderBy('order')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');

        $request->validate([
            'title' => 'required',
            'issuer' => 'required',
            'date' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('certificates', 'public');
        }

        Certificate::create([
            'title' => $request->title,
            'issuer' => $request->issuer,
            'date' => $request->date,
            'credential_url' => $request->credential_url,
            'image' => $imagePath,
            'order' => $request->order ?? 1,
        ]);

        return redirect('/admin/certificates')->with('success', 'Sertifika başarıyla eklendi.');
    }

    public function edit($id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $certificate = Certificate::findOrFail($id);
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $certificate = Certificate::findOrFail($id);

        $imagePath = $certificate->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('certificates', 'public');
        }

        $certificate->update([
            'title' => $request->title,
            'issuer' => $request->issuer,
            'date' => $request->date,
            'credential_url' => $request->credential_url,
            'image' => $imagePath,
            'order' => $request->order ?? 1,
        ]);

        return redirect('/admin/certificates')->with('success', 'Sertifika başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        Certificate::findOrFail($id)->delete();
        return redirect('/admin/certificates')->with('success', 'Sertifika başarıyla silindi.');
    }
}