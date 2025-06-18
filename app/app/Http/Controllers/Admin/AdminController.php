<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'admin_users' => User::role('admin')->count(),
            'regular_users' => User::role('user')->count(),
            'recent_users' => User::with('roles')->latest()->take(10)->get(),
            'users_with_weak_passwords' => User::where('password_meets_requirements', false)->count(),
            'users_with_strong_passwords' => User::where('password_meets_requirements', true)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
