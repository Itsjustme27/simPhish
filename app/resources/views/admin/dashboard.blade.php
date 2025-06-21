@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0 text-dark-800" >Admin Dashboard</h1>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bolder text-primary text-uppercase mb-1">
                                            <strong>Total Users</strong>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold ">
                                            {{ \App\Models\User::count() }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-dark-300"></i>
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
                                            <strong>Active Campaigns</strong>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold ">0</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-shield-alt fa-2x text-dark-300"></i>
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
                                            <strong>Admin Users</strong>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold ">
                                            {{ \App\Models\User::role('admin')->count() }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-shield fa-2x text-dark-300"></i>
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
                                            <b>Regular users</b>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold ">
                                            {{ \App\Models\User::role('user')->count() }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-dark-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Row -->
                <div class="row d-flex align-items-center justify-content-center">
                    <!-- System Status Panel -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><b>System Status</b></h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Database Connection</span>
                                        <span class="badge bg-success">Online</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Email Service</span>
                                        <span class="badge bg-success">Active</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Cache System</span>
                                        <span class="badge bg-success">Running</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add this card to your admin dashboard -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-50 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            <b>Weak Passwords</b>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold ">
                                            {{ $stats['users_with_weak_passwords'] }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-exclamation-triangle fa-2x text-dark-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-50 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <b>Strong Passwords</b>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold ">
                                            {{ $stats['users_with_strong_passwords'] }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-shield-alt fa-2x text-dark-300"></i>
                                    </div>
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
                                <h6 class="m-0 font-weight-bold text-primary"><b>Recent User Activity</b></h6>
                            </div>
                            <div class="card-body">
                                <!-- Success/Error Messages -->
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                @endif

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
                                                        @if(isset($user->password_meets_requirements))
                                                            @if($user->password_meets_requirements)
                                                                <span class="badge bg-success text-white">Strong Password</span>
                                                            @else
                                                                <span class="badge bg-warning text-dark">Weak Password</span>
                                                            @endif
                                                        @else
                                                            <span class="badge bg-secondary text-white">Unknown</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                    <td>
                                                        @if($user->hasRole('admin'))
                                                            <!-- No delete button for admin users -->
                                                            <span class="text-muted">Admin User</span>
                                                        @else
                                                            <!-- Delete button only for non-admin users -->
                                                            <form method="POST"
                                                                action="{{ route('admin.users.delete', $user->id) }}"
                                                                style="display: inline;"
                                                                onsubmit="return confirm('Are you sure you want to delete {{ $user->name }}?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                    <i class="fas fa-trash"></i> Delete
                                                                </button>
                                                            </form>
                                                        @endif
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
                                <h6 class="m-0 font-weight-bold text-primary"><b>Navigation</b></h6>
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