@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0 text-gray-800 dashboard-title">Phishy Dashboard</h1>
                    <div class="text-muted">
                        Welcome back, <strong>{{ Auth::user()->name }}</strong>!
                    </div>
                </div>

                <!-- Main Dashboard Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Phishing Simulation Modules</h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-4 text-muted">Choose a perspective to begin your cybersecurity training experience:</p>

                        <!-- Module Selection Cards -->
                        <div class="row">
                            <!-- Attacker Mode -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2 module-card">
                                    <div class="card-body text-center">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="module-icon mb-3">
                                                    <i class="fas fa-user-secret fa-3x text-danger"></i>
                                                </div>
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Social Engineering
                                                </div>
                                                <div class="h5 mb-2 font-weight-bold text-gray-800">Attacker Mode</div>
                                                <p class="text-muted small mb-3">Learn to craft convincing phishing emails
                                                    and understand attack methodologies</p>
                                                <a href="{{ route('attacker.index') }}"
                                                    class="btn btn-danger btn-block shadow-sm">
                                                    <i class="fas fa-play me-2"></i>Start Attacking
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Victim Mode -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2 module-card">
                                    <div class="card-body text-center">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="module-icon mb-3">
                                                    <i class="fas fa-user fa-3x text-warning"></i>
                                                </div>
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Vulnerability Assessment
                                                </div>
                                                <div class="h5 mb-2 font-weight-bold text-gray-800">Victim Mode</div>
                                                <p class="text-muted small mb-3">Experience being targeted and learn to
                                                    recognize phishing attempts</p>
                                                <a href="{{ route('victim.index') }}"
                                                    class="btn btn-warning btn-block shadow-sm">
                                                    <i class="fas fa-eye me-2"></i>Experience Attacks
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Defender Mode -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2 module-card">
                                    <div class="card-body text-center">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="module-icon mb-3">
                                                    <i class="fas fa-shield-alt fa-3x text-primary"></i>
                                                </div>
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Threat Detection
                                                </div>
                                                <div class="h5 mb-2 font-weight-bold text-gray-800">Defender Mode</div>
                                                <p class="text-muted small mb-3">Analyze emails and develop skills to detect
                                                    malicious content</p>
                                                <a href="{{ route('defender.index') }}"
                                                    class="btn btn-primary btn-block shadow-sm">
                                                    <i class="fas fa-search me-2"></i>Start Defending
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Section -->
                <div class="row">
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Your Progress
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Getting Started</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Security Score
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            @if(auth()->user()->password_meets_requirements ?? false)
                                                Strong
                                            @else
                                                Needs Improvement
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-lock fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Learning Path
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Multi-Perspective</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
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
        /* Dashboard styling matching admin theme */
        .dashboard-title {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            letter-spacing: -0.025em;
        }

        .text-gray-800 {
            color: #5a5c69 !important;
        }

        .text-gray-300 {
            color: #dddfeb !important;
        }

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

        .border-left-danger {
            border-left: 0.25rem solid #e74a3b !important;
        }

        /* Enhanced module card transitions with color fills */
        .module-card {
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .module-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            z-index: 1;
        }

        .module-card .card-body {
            position: relative;
            z-index: 2;
            transition: color 0.3s ease-in-out;
        }

        /* Attacker Mode - Danger/Red hover */
        .border-left-danger.module-card::before {
            background: linear-gradient(135deg, rgba(231, 74, 59, 0.1), rgba(231, 74, 59, 0.05));
        }

        .border-left-danger.module-card:hover::before {
            opacity: 1;
        }

        .border-left-danger.module-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 1rem 2rem rgba(231, 74, 59, 0.2) !important;
            border-left-color: #dc3545 !important;
        }

        .border-left-danger.module-card:hover .text-gray-800 {
            color: #721c24 !important;
        }

        .border-left-danger.module-card:hover .text-muted {
            color: #6c757d !important;
        }

        /* Victim Mode - Warning/Yellow hover */
        .border-left-warning.module-card::before {
            background: linear-gradient(135deg, rgba(252, 194, 62, 0.1), rgba(252, 194, 62, 0.05));
        }

        .border-left-warning.module-card:hover::before {
            opacity: 1;
        }

        .border-left-warning.module-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 1rem 2rem rgba(252, 194, 62, 0.2) !important;
            border-left-color: #ffc107 !important;
        }

        .border-left-warning.module-card:hover .text-gray-800 {
            color: #664d03 !important;
        }

        .border-left-warning.module-card:hover .text-muted {
            color: #6c757d !important;
        }

        /* Defender Mode - Primary/Blue hover */
        .border-left-primary.module-card::before {
            background: linear-gradient(135deg, rgba(78, 115, 223, 0.1), rgba(78, 115, 223, 0.05));
        }

        .border-left-primary.module-card:hover::before {
            opacity: 1;
        }

        .border-left-primary.module-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 1rem 2rem rgba(78, 115, 223, 0.2) !important;
            border-left-color: #4e73df !important;
        }

        .border-left-primary.module-card:hover .text-gray-800 {
            color: #1e2761 !important;
        }

        .border-left-primary.module-card:hover .text-muted {
            color: #6c757d !important;
        }

        /* Icon scaling and color transitions */
        .module-icon {
            transition: all 0.3s ease-in-out;
        }

        .module-card:hover .module-icon {
            transform: scale(1.15);
        }

        .border-left-danger.module-card:hover .module-icon i {
            color: #dc3545 !important;
            text-shadow: 0 0 20px rgba(231, 74, 59, 0.3);
        }

        .border-left-warning.module-card:hover .module-icon i {
            color: #ffc107 !important;
            text-shadow: 0 0 20px rgba(252, 194, 62, 0.3);
        }

        .border-left-primary.module-card:hover .module-icon i {
            color: #4e73df !important;
            text-shadow: 0 0 20px rgba(78, 115, 223, 0.3);
        }

        /* Button hover enhancements */
        .module-card:hover .btn {
            transform: scale(1.05);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        /* Dark mode support */
        [data-bs-theme="dark"] .text-gray-800 {
            color: #e3e6f0 !important;
        }

        [data-bs-theme="dark"] .text-gray-300 {
            color: #858796 !important;
        }

        [data-bs-theme="dark"] .card {
            background-color: #2c3034;
            border-color: rgba(255, 255, 255, 0.1);
        }

        [data-bs-theme="dark"] .text-muted {
            color: #b7b9cc !important;
        }

        /* Dark mode hover effects */
        [data-bs-theme="dark"] .border-left-danger.module-card:hover .text-gray-800 {
            color: #ff6b6b !important;
        }

        [data-bs-theme="dark"] .border-left-warning.module-card:hover .text-gray-800 {
            color: #ffd93d !important;
        }

        [data-bs-theme="dark"] .border-left-primary.module-card:hover .text-gray-800 {
            color: #74a9ff !important;
        }
    </style>

@endsection