<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Landing page (optional)
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Dashboard route - redirects based on role
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login'); // Redirect to login instead of welcome view
});


Route::get('/dashboard', function () {
    return view('dashboard'); // Ensure you have a `dashboard.blade.php` view file
})->name('dashboard');

// User routes - protected by authentication and user role
Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/attacker', [App\Http\Controllers\AttackerController::class, 'index'])->name('attacker.index');
    
    Route::get('/attacker/attackbot', [App\Http\Controllers\AttackBotController::class, 'index'])->name('attacker.attackbot');
    Route::post('/attacker/attackbot/simulate', [App\Http\Controllers\AttackBotController::class, 'simulateVictim'])
        ->middleware('permission:take-phishing-tests')
        ->name('attackbot.simulate');
    
    Route::get('/victim', [App\Http\Controllers\VictimController::class, 'index'])->name('victim.index');
    
    Route::get('/defender', [App\Http\Controllers\DefenderController::class, 'index'])->name('defender.index');
    Route::post('/defender/scan', [App\Http\Controllers\DefenderController::class, 'scan'])
        ->middleware('permission:take-phishing-tests')
        ->name('defender.scan');
});

// Admin routes - protected by admin role
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');

    // User deletion route
    Route::delete('/admin/users/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteUser'])
        ->name('admin.users.delete');
});
