<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginForm() 
    {
        return view('admin.login');
    }

    public function login(Request $request) 
    {
        $password = $request -> input('password');

        if($password === env('ADMIN_PASSWORD')) {
            session(['admin_logged_in' => true]);
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Şifre yanlış.');
    }

    public function dashboard()
    {
        if(!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        return view('admin.dashboard');
    }

    public function logout() {
        session()->forget('admin_logged_in');
        return redirect('/admin/login');
    }
}