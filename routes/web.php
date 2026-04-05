<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view("home");
});

Route::get('/projeler', [ProjectController::class, 'index']);

?>