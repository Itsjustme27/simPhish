@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
                    <div class="text-muted">
                        Welcome back, <strong>{{ auth()->user()->name }}</strong>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Users
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ \App\Models\User::count() }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Active Campaigns
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-shield-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Admin Users
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ \App\Models\User::role('admin')->count() }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Regular Users
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ \App\Models\User::role('user')->count() }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Row -->
                <div class="row">
                    <!-- Quick Actions Panel -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @can('manage-users')
                                        <div class="col-md-6 mb-3">
                                            <a href="#" class="btn btn-primary btn-block">
                                                <i class="fas fa-users mr-2"></i>Manage Users
                                            </a>
                                        </div>
                                    @endcan

                                    @can('launch-phishing-simulation')
                                        <div class="col-md-6 mb-3">
                                            <a href="#" class="btn btn-success btn-block">
                                                <i class="fas fa-paper-plane mr-2"></i>Launch Campaign
                                            </a>
                                        </div>
                                    @endcan

                                    @can('view-user-reports')
                                        <div class="col-md-6 mb-3">
                                            <a href="#" class="btn btn-info btn-block">
                                                <i class="fas fa-chart-bar mr-2"></i>View Reports
                                            </a>
                                        </div>
                                    @endcan

                                    @can('delete-users')
                                        <div class="col-md-6 mb-3">
                                            <a href="#" class="btn btn-warning btn-block">
                                                <i class="fas fa-user-times mr-2"></i>User Cleanup
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Add this card to your admin dashboard -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Weak Passwords
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $stats['users_with_weak_passwords'] }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Strong Passwords
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $stats['users_with_strong_passwords'] }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shield-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Recent Activity Table -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Recent User Activity</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Last Login</th>
                                                <th>Password Strength</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(\App\Models\User::with('roles')->latest()->take(10)->get() as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @foreach($user->roles as $role)
                                                            <span
                                                                class="badge bg-{{ $role->name === 'admin' ? 'danger' : 'primary' }}">
                                                                {{ ucfirst($role->name) }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                                    <td>    
                                                        @if ($user->password_meets_requirements)
                                                            <span class="badge bg-success">Strong Password</span>
                                                        @else
                                                            <span class="badge bg-warning">Weak Password</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                    <td>
                                                        @can('manage-users')
                                                            <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                                        @endcan
                                                        @can('delete-users')
                                                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Navigation</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-block">
                                            <i class="fas fa-tachometer-alt mr-2"></i>User Dashboard
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" class="btn btn-outline-secondary btn-block">
                                            <i class="fas fa-cog mr-2"></i>Settings
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" class="btn btn-outline-secondary btn-block">
                                            <i class="fas fa-download mr-2"></i>Export Data
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" class="btn btn-outline-secondary btn-block">
                                            <i class="fas fa-question-circle mr-2"></i>Help & Support
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .border-left-primary {
            border-left: 0.25rem solid #4e73df !important;
        }

        .border-left-success {
            border-left: 0.25rem solid #1cc88a !important;
        }

        .border-left-info {
            border-left: 0.25rem solid #36b9cc !important;
        }

        .border-left-warning {
            border-left: 0.25rem solid #f6c23e !important;
        }

        .text-gray-800 {
            color: #5a5c69 !important;
        }

        .text-gray-300 {
            color: #dddfeb !important;
        }
    </style>
@endsection