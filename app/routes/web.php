<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// If Landing page is required uncomment this 
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/attacker', [App\Http\Controllers\AttackerController::class, 'index'])->name('attacker.index');

Route::get('/victim', [App\Http\Controllers\VictimController::class, 'index'])->name('victim.index');

Route::get('/defender', [App\Http\Controllers\DefenderController::class, 'index'])->name('defender.index');