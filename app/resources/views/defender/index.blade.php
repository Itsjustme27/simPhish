@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0 text-gray-800 dashboard-title">
                        <i class="fas fa-shield-alt text-primary me-2"></i>Defender Mode
                    </h1>
                    <p class="text-muted mb-0">Analyze Emails & Detect Malicious Content</p>
                </div>
                <div class="text-muted">
                    <i class="fas fa-search me-1"></i>
                    Threat Detection System
                </div>
            </div>

            <!-- Control Panel -->
            <div class="row mb-4">
                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-header py-3 bg-gradient-primary">
                            <h6 class="m-0 font-weight-bold text-white">
                                <i class="fas fa-scanner me-2"></i>Security Scanner
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <p class="mb-2">Scan your inbox for potential phishing emails and malicious content using advanced pattern recognition.</p>
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Scanner analyzes sender patterns, suspicious links, and social engineering tactics
                                    </small>
                                </div>
                                <div class="col-md-4 text-center">
                                    <form method="POST" action="{{ route('defender.scan') }}">
                                        @csrf
                                        <button class="btn btn-primary btn-lg shadow-sm scan-btn">
                                            <i class="fas fa-search me-2"></i>Scan Inbox
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scan Statistics -->
                <div class="col-lg-4">
                    <div class="card border-left-info shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Emails
                                    </div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">{{ count($emails) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scan Results -->
            @isset($alerts)
            <div class="row mb-4">
                <div class="col-12">
                    @if(count($alerts) > 0)
                        <div class="card border-left-danger shadow">
                            <div class="card-header py-3 bg-gradient-danger">
                                <h6 class="m-0 font-weight-bold text-white">
                                    <i class="fas fa-exclamation-triangle me-2"></i>Threat Detection Results
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger d-flex align-items-center mb-3">
                                    <i class="fas fa-shield-alt fa-2x me-3"></i>
                                    <div>
                                        <h5 class="alert-heading mb-1">⚠️ {{ count($alerts) }} Suspicious Email(s) Detected</h5>
                                        <p class="mb-0">Our security scanner has identified potential threats in your inbox.</p>
                                    </div>
                                </div>

                                <div class="row">
                                    @foreach($alerts as $alert)
                                    <div class="col-md-6 mb-3">
                                        <div class="card border-danger">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start">
                                                    <div class="threat-icon me-3">
                                                        <i class="fas fa-exclamation-triangle text-danger"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="card-title text-danger mb-2">
                                                            <i class="fas fa-flag me-1"></i>Threat Detected
                                                        </h6>
                                                        <p class="card-text mb-2">
                                                            <strong>From:</strong> {{ $alert['from'] }}<br>
                                                            <strong>Subject:</strong> {{ $alert['subject'] }}
                                                        </p>
                                                        <div class="alert alert-light mb-0">
                                                            <small>
                                                                <i class="fas fa-search me-1"></i>
                                                                <strong>Detection Reason:</strong> {!! $alert['reason'] !!}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card border-left-success shadow">
                            <div class="card-body">
                                <div class="alert alert-success d-flex align-items-center mb-0">
                                    <i class="fas fa-check-circle fa-2x me-3"></i>
                                    <div>
                                        <h5 class="alert-heading mb-1">✅ Inbox Security Status: Clean</h5>
                                        <p class="mb-0">No suspicious emails detected. Your inbox appears to be safe from phishing threats.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @endisset

            <!-- Email Inbox -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-inbox me-2"></i>Email Inbox Analysis
                    </h6>
                </div>
                <div class="card-body p-0">
                    @if(count($emails) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0">
                                            <i class="fas fa-user me-1"></i>Sender
                                        </th>
                                        <th class="border-0">
                                            <i class="fas fa-subject me-1"></i>Subject
                                        </th>
                                        <th class="border-0">
                                            <i class="fas fa-shield-alt me-1"></i>Status
                                        </th>
                                        <th class="border-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($emails as $index => $email)
                                    @php
                                        $isSuspicious = isset($alerts) && collect($alerts)->contains('from', $email->sender);
                                    @endphp
                                    <tr class="email-row {{ $isSuspicious ? 'suspicious-email' : '' }}">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="sender-avatar me-2 {{ $isSuspicious ? 'bg-danger' : 'bg-primary' }}">
                                                    <i class="fas {{ $isSuspicious ? 'fa-exclamation' : 'fa-envelope' }}"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-bold">{{ $email->sender }}</div>
                                                    <small class="text-muted">Email Analysis</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-bold">{{ $email->subject }}</div>
                                            <small class="text-muted">{{ Str::limit($email->body, 50) }}</small>
                                        </td>
                                        <td>
                                            @if($isSuspicious)
                                                <span class="badge bg-danger">
                                                    <i class="fas fa-exclamation-triangle me-1"></i>Suspicious
                                                </span>
                                            @else
                                                <span class="badge bg-success">
                                                    <i class="fas fa-check me-1"></i>Clean
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm" 
                                                    data-bs-toggle="collapse" 
                                                    data-bs-target="#emailBody{{ $index }}">
                                                <i class="fas fa-eye me-1"></i>Analyze
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="p-0">
                                            <div class="collapse" id="emailBody{{ $index }}">
                                                <div class="card card-body m-3 {{ $isSuspicious ? 'border-danger' : '' }}">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <h6>Email Content:</h6>
                                                            <div class="email-content p-3 bg-light rounded">
                                                                {{ $email->body }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6>Security Analysis:</h6>
                                                            <div class="analysis-panel">
                                                                @if($isSuspicious)
                                                                    <div class="alert alert-danger">
                                                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                                                        <strong>Threat Detected</strong>
                                                                    </div>
                                                                @else
                                                                    <div class="alert alert-success">
                                                                        <i class="fas fa-check-circle me-1"></i>
                                                                        <strong>Appears Safe</strong>
                                                                    </div>
                                                                @endif
                                                                
                                                                <div class="security-checklist">
                                                                    <small class="text-muted">Security Checks:</small>
                                                                    <div class="mt-2">
                                                                        <div class="d-flex justify-content-between">
                                                                            <span>Sender Verification</span>
                                                                            <i class="fas fa-{{ $isSuspicious ? 'times text-danger' : 'check text-success' }}"></i>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between">
                                                                            <span>Link Analysis</span>
                                                                            <i class="fas fa-{{ strpos($email->body, 'http') !== false ? 'times text-danger' : 'check text-success' }}"></i>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between">
                                                                            <span>Content Scan</span>
                                                                            <i class="fas fa-{{ $isSuspicious ? 'times text-danger' : 'check text-success' }}"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center p-5">
                            <i class="fas fa-inbox fa-3x text-gray-300 mb-3"></i>
                            <h5 class="text-gray-600">No Emails Found</h5>
                            <p class="text-muted">Your inbox is empty. Try the Attacker Mode to generate some emails for analysis.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Back to Dashboard -->
            <div class="text-center mt-4">
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

.bg-gradient-primary {
    background: linear-gradient(45deg, #4e73df, #224abe);
}

.bg-gradient-danger {
    background: linear-gradient(45deg, #e74a3b, #c23321);
}

.scan-btn {
    transition: all 0.3s ease-in-out;
}

.scan-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.email-row {
    transition: all 0.2s ease-in-out;
}

.email-row:hover {
    background-color: rgba(0,123,255,0.05);
}

.suspicious-email {
    border-left: 4px solid #dc3545;
    background-color: rgba(220, 53, 69, 0.05);
}

.suspicious-email:hover {
    background-color: rgba(220, 53, 69, 0.1);
}

.sender-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 14px;
}

.threat-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: rgba(220, 53, 69, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.email-content {
    max-height: 200px;
    overflow-y: auto;
    font-family: monospace;
    font-size: 0.9em;
}

.analysis-panel {
    background-color: #f8f9fa;
    border-radius: 0.375rem;
    padding: 1rem;
}

.security-checklist {
    font-size: 0.875rem;
}

.security-checklist .d-flex {
    padding: 0.25rem 0;
    border-bottom: 1px solid #e9ecef;
}

.security-checklist .d-flex:last-child {
    border-bottom: none;
}

/* Border styles */
.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}

.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}

.border-left-danger {
    border-left: 0.25rem solid #e74a3b !important;
}

.text-gray-800 {
    color: #5a5c69 !important;
}

.text-gray-300 {
    color: #dddfeb !important;
}

.text-gray-600 {
    color: #858796 !important;
}

/* Dark mode support */
[data-bs-theme="dark"] .text-gray-800 {
    color: #e3e6f0 !important;
}

[data-bs-theme="dark"] .text-gray-300 {
    color: #858796 !important;
}

[data-bs-theme="dark"] .text-gray-600 {
    color: #b7b9cc !important;
}

[data-bs-theme="dark"] .card {
    background-color: #2c3034;
    border-color: rgba(255,255,255,0.1);
}

[data-bs-theme="dark"] .table {
    color: #e3e6f0;
}

[data-bs-theme="dark"] .table-hover tbody tr:hover {
    background-color: rgba(255,255,255,0.075);
}

[data-bs-theme="dark"] .bg-light {
    background-color: #3a3f44 !important;
}

[data-bs-theme="dark"] .analysis-panel {
    background-color: #3a3f44;
}

[data-bs-theme="dark"] .email-content {
    background-color: #3a3f44 !important;
    color: #e3e6f0;
}
</style>
@endsection
