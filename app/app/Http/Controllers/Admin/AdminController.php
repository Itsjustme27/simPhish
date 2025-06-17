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
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
