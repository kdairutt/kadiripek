<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("home");
});

use App\Http\Controllers\ProjectController;

Route::get('/projeler', [ProjectController::class, 'index']);

use App\Http\Controllers\AdminController;

Route::get('/admin/login', [AdminController::class, 'loginForm']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::post('/admin/logout', [AdminController::class, 'logout']);

use App\Http\Controllers\Admin\ExperienceController as AdminExperienceController;

Route::get('/admin/experiences', [AdminExperienceController::class, 'index']);
Route::get('/admin/experiences/create', [AdminExperienceController::class, 'create']);
Route::post('/admin/experiences', [AdminExperienceController::class, 'store']);
Route::get('/admin/experiences/{id}/edit', [AdminExperienceController::class, 'edit']);
Route::put('/admin/experiences/{id}', [AdminExperienceController::class, 'update']);
Route::delete('/admin/experiences/{id}', [AdminExperienceController::class, 'destroy']);

use App\Http\Controllers\Admin\EducationController as AdminEducationController;

Route::get('/admin/educations', [AdminEducationController::class, 'index']);
Route::get('/admin/educations/create', [AdminEducationController::class, 'create']);
Route::post('/admin/educations', [AdminEducationController::class, 'store']);
Route::get('/admin/educations/{id}/edit', [AdminEducationController::class, 'edit']);
Route::put('/admin/educations/{id}', [AdminEducationController::class, 'update']);
Route::delete('/admin/educations/{id}', [AdminEducationController::class, 'destroy']);

use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;

Route::get('/admin/certificates', [AdminCertificateController::class, 'index']);
Route::get('/admin/certificates/create', [AdminCertificateController::class, 'create']);
Route::post('/admin/certificates', [AdminCertificateController::class, 'store']);
Route::get('/admin/certificates/{id}/edit', [AdminCertificateController::class, 'edit']);
Route::put('/admin/certificates/{id}', [AdminCertificateController::class, 'update']);
Route::delete('/admin/certificates/{id}', [AdminCertificateController::class, 'destroy']);

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

Route::get('/admin/projects', [AdminProjectController::class, 'index']);
Route::get('/admin/projects/create', [AdminProjectController::class, 'create']);
Route::post('/admin/projects', [AdminProjectController::class, 'store']);
Route::get('/admin/projects/{id}/edit', [AdminProjectController::class, 'edit']);
Route::put('/admin/projects/{id}', [AdminProjectController::class, 'update']);
Route::delete('/admin/projects/{id}', [AdminProjectController::class, 'destroy']);