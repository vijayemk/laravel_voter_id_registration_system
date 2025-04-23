<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Routes for HomeController
Route::middleware(['auth', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home');
Route::get('voters-create', [HomeController::class, 'votersCreate'])->name('voters.create');
Route::get('voters-list', [HomeController::class, 'votersList'])->name('voters.list');

// Routes for VoterController
Route::resource('voters', VoterController::class);
Route::get('voters-export', [VoterController::class, 'export'])->name('voters.export');
