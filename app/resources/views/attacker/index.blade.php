@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0 text-gray-800 dashboard-title">
                        <i class="fas fa-user-secret text-danger me-2"></i>Attacker Mode
                    </h1>
                    <p class="text-muted mb-0">Social Engineering & Phishing Campaign Creation</p>
                </div>
                <div class="text-muted">
                    <i class="fas fa-shield-alt me-1"></i>
                    Training Environment
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-gradient-danger">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-crosshairs me-2"></i>Choose Your Attack Simulation
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Simulation Mode Selection -->
                        <div class="col-lg-6 mb-4">
                            <div class="card border-left-danger shadow h-100 simulation-card">
                                <div class="card-body text-center p-4">
                                    <div class="simulation-icon mb-3">
                                        <i class="fas fa-robot fa-4x text-info"></i>
                                    </div>
                                    <h5 class="font-weight-bold text-gray-800 mb-3">Bot Simulation</h5>
                                    <p class="text-muted mb-4">Practice against an AI-powered victim bot with realistic responses and vulnerability patterns.</p>
                                    
                                    <div class="feature-list mb-4">
                                        <div class="feature-item mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span class="small">Probability-based responses</span>
                                        </div>
                                        <div class="feature-item mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span class="small">Realistic scoring system</span>
                                        </div>
                                        <div class="feature-item mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <span class="small">Instant feedback</span>
                                        </div>
                                    </div>
                                    
                                    <a href="{{ route('attacker.attackbot') }}" class="btn btn-info btn-block shadow-sm">
                                        <i class="fas fa-play me-2"></i>Start Bot Simulation
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Multiplayer Mode -->
                        <div class="col-lg-6 mb-4">
                            <div class="card border-left-success shadow h-100 simulation-card">
                                <div class="card-body text-center p-4">
                                    <div class="simulation-icon mb-3">
                                        <i class="fas fa-users fa-4x text-success"></i>
                                    </div>
                                    <h5 class="font-weight-bold text-gray-800 mb-3">Multiplayer Mode</h5>
                                    <p class="text-muted mb-4">Compete with other users in real-time phishing simulation challenges.</p>
                                    
                                    <div class="feature-list mb-4">
                                        <div class="feature-item mb-2">
                                            <i class="fas fa-clock text-warning me-2"></i>
                                            <span class="small">Coming Soon</span>
                                        </div>
                                        <div class="feature-item mb-2">
                                            <i class="fas fa-trophy text-warning me-2"></i>
                                            <span class="small">Competitive scoring</span>
                                        </div>
                                        <div class="feature-item mb-2">
                                            <i class="fas fa-chart-line text-warning me-2"></i>
                                            <span class="small">Leaderboards</span>
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-outline-success btn-block" disabled>
                                        <i class="fas fa-lock me-2"></i>Coming Soon
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats Row -->
                    <div class="row mt-4">
                        <div class="col-md-4 mb-3">
                            <div class="card border-left-info shadow-sm">
                                <div class="card-body py-3">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Success Rate
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">Track Your Progress</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-percentage fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card border-left-warning shadow-sm">
                                <div class="card-body py-3">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Techniques
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">Learn & Practice</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-brain fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card border-left-danger shadow-sm">
                                <div class="card-body py-3">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Impact
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">Measure Results</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bullseye fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to Dashboard -->
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<style>
/* Enhanced styling matching your admin dashboard */
.dashboard-title {
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    letter-spacing: -0.025em;
}

.bg-gradient-danger {
    background: linear-gradient(45deg, #e74a3b, #dc3545);
}

.simulation-card {
    transition: all 0.3s ease-in-out;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.simulation-card::before {
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

.simulation-card .card-body {
    position: relative;
    z-index: 2;
}

/* Bot Simulation hover effect */
.border-left-info.simulation-card::before {
    background: linear-gradient(135deg, rgba(54, 185, 204, 0.1), rgba(54, 185, 204, 0.05));
}

.border-left-info.simulation-card:hover::before {
    opacity: 1;
}

.border-left-info.simulation-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 1rem 2rem rgba(54, 185, 204, 0.2) !important;
}

/* Multiplayer hover effect */
.border-left-success.simulation-card::before {
    background: linear-gradient(135deg, rgba(28, 200, 138, 0.1), rgba(28, 200, 138, 0.05));
}

.border-left-success.simulation-card:hover::before {
    opacity: 1;
}

.border-left-success.simulation-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 1rem 2rem rgba(28, 200, 138, 0.2) !important;
}

.simulation-icon {
    transition: all 0.3s ease-in-out;
}

.simulation-card:hover .simulation-icon {
    transform: scale(1.1);
}

.feature-item {
    display: flex;
    align-items: center;
    text-align: left;
}

/* Border styles */
.border-left-danger {
    border-left: 0.25rem solid #e74a3b !important;
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

/* Dark mode support */
[data-bs-theme="dark"] .text-gray-800 {
    color: #e3e6f0 !important;
}

[data-bs-theme="dark"] .text-gray-300 {
    color: #858796 !important;
}

[data-bs-theme="dark"] .card {
    background-color: #2c3034;
    border-color: rgba(255,255,255,0.1);
}

[data-bs-theme="dark"] .text-muted {
    color: #b7b9cc !important;
}
</style>
@endsection
