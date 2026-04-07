<?php

namespace App\Http\Controllers;

use App\Models\Certificate;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('order')->get();
        return view('certificates.index', compact('certificates'));
    }
}