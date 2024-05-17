<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PendaftaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('jurusan', JurusanController::class);
Route::resource('pendaftaran', PendaftaranController::class);