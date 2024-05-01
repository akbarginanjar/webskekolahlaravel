<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('jurusan', JurusanController::class);