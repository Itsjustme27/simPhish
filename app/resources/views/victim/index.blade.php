@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0 text-gray-800 dashboard-title">
                        <i class="fas fa-user text-warning me-2"></i>Victim Mode
                    </h1>
                    <p class="text-muted mb-0">Experience Phishing Attacks & Learn to Recognize Threats</p>
                </div>
                <div class="text-muted">
                    <i class="fas fa-shield-alt me-1"></i>
                    Safe Training Environment
                </div>
            </div>

            <!-- Main Content -->
            <div class="row">
                <!-- Inbox Section -->
                <div class="col-lg-8 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3 bg-gradient-warning">
                            <h6 class="m-0 font-weight-bold text-white">
                                <i class="fas fa-inbox me-2"></i>Your Inbox
                            </h6>
                        </div>
                        <div class="card-body p-0">
                            <!-- Email List -->
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="border-0">
                                                <i class="fas fa-envelope me-1"></i>Sender
                                            </th>
                                            <th class="border-0">
                                                <i class="fas fa-subject me-1"></i>Subject
                                            </th>
                                            <th class="border-0">
                                                <i class="fas fa-clock me-1"></i>Time
                                            </th>
                                            <th class="border-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Phishing Email -->
                                        <tr class="email-row suspicious-email">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="sender-avatar me-2">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold">support@fb.com</div>
                                                        <small class="text-muted">Facebook Security</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold">🚨 Security Alert - Immediate Action Required</div>
                                                <small class="text-muted">Someone tried to access your account...</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-danger">2 min ago</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-primary btn-sm view-email" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#emailModal">
                                                    <i class="fas fa-eye me-1"></i>View
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Legitimate Emails for Comparison -->
                                        <tr class="email-row">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="sender-avatar me-2 bg-success">
                                                        <i class="fas fa-building"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold">noreply@bank.com</div>
                                                        <small class="text-muted">Your Bank</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold">Monthly Statement Available</div>
                                                <small class="text-muted">Your statement is ready for review</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">1 hour ago</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-secondary btn-sm" disabled>
                                                    <i class="fas fa-eye me-1"></i>View
                                                </button>
                                            </td>
                                        </tr>

                                        <tr class="email-row">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="sender-avatar me-2 bg-info">
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold">orders@amazon.com</div>
                                                        <small class="text-muted">Amazon</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold">Your order has been shipped</div>
                                                <small class="text-muted">Track your package delivery</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">3 hours ago</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-secondary btn-sm" disabled>
                                                    <i class="fas fa-eye me-1"></i>View
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar with Tips -->
                <div class="col-lg-4">
                    <!-- Warning Card -->
                    <div class="card border-left-warning shadow mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Training Mode
                                    </div>
                                    <div class="h6 mb-2 font-weight-bold text-gray-800">Stay Alert!</div>
                                    <p class="text-muted small mb-0">Look for suspicious emails and learn to identify phishing attempts.</p>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tips Card -->
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-lightbulb me-2"></i>Security Tips
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="tip-item mb-3">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <small>Check sender email addresses carefully</small>
                                </div>
                            </div>
                            <div class="tip-item mb-3">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <small>Look for urgent language and threats</small>
                                </div>
                            </div>
                            <div class="tip-item mb-3">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <small>Hover over links before clicking</small>
                                </div>
                            </div>
                            <div class="tip-item">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                    <small>Verify requests through official channels</small>
                                </div>
                            </div>
                        </div>
                    </div>
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

<!-- Enhanced Email Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-envelope me-2"></i>From: support@fb.com
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <!-- Email Content -->
                <div class="email-content p-4">
                    <table style="max-width: 100%; margin: auto; background-color: white; padding: 20px; border-radius: 6px;" class="mail-table">
                        <tr>
                            <td style="text-align: center; padding-bottom: 20px;">
                                <img src="https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg" alt="Facebook" style="width: 120px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2 style="color: #1877f2; margin-bottom: 20px;">🚨 Security Alert</h2>
                                <p style="margin-bottom: 15px;">Someone recently tried to log into your Facebook account from an unrecognized device.</p>
                                
                                <div style="padding: 15px; border-radius: 5px; margin: 20px 0;" class="mail-content">
                                    <p style="margin: 5px 0;"><strong>📍 Location:</strong> Kathmandu, Nepal</p>
                                    <p style="margin: 5px 0;"><strong>💻 Device:</strong> Windows PC - Chrome</p>
                                    <p style="margin: 5px 0;"><strong>⏰ Time:</strong> Just now</p>
                                    <p style="margin-bottom: 15px;">If this was you, you can safely disregard this email.</p>
                                </div>
                                
                                
                                <p style="margin-bottom: 25px; color: #dc3545; font-weight: bold;">⚠️ If it wasn't you, please secure your account immediately by changing your password.</p>
                                
                                <div style="text-align: center; padding: 20px;">
                                    <a href="{{ $phishUrl }}" 
                                       onclick="triggerPhishingAlert()"
                                       style="background-color: #1877f2; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;"
                                       target="_blank">
                                        🔒 Secure My Account Now
                                    </a>
                                </div>
                                
                                <hr style="margin: 30px 0;">
                                <p style="font-size: 12px; color: #6c757d; text-align: center;">
                                    Meta © 2025 | This email was sent to protect your account
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <div class="d-flex justify-content-between w-100">
                    <small class="text-muted">
                        <i class="fas fa-exclamation-triangle text-warning me-1"></i>
                        This is a simulated phishing email for training purposes
                    </small>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
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

.bg-gradient-warning {
    background: linear-gradient(45deg, #f6c23e, #ffc107);
}

.email-row {
    transition: all 0.2s ease-in-out;
}

.email-row:hover {
    background-color: rgba(0,123,255,0.05);
    transform: translateX(5px);
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
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 14px;
}

.tip-item {
    transition: transform 0.2s ease-in-out;
}

.tip-item:hover {
    transform: translateX(5px);
}

.email-content {
    max-height: 70vh;
    overflow-y: auto;
}

/* Border styles */
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

[data-bs-theme="dark"] .mail-table {
    background-color: #2c3034 !important;
}



[data-bs-theme="dark"] .text-gray-300 {
    color: #858796 !important;
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
</style>

<script>
function triggerPhishingAlert() {
    // Prevent the link from actually opening
    
    // Show educational alert
    Swal.fire({
        title: '🎯 You\'ve Been Phished!',
        html: `
            <div class="text-start">
                <p><strong>This was a phishing simulation!</strong></p>
                <p>Here's what made this email suspicious:</p>
                <ul class="text-start">
                    <li>🚨 Urgent language creating fear</li>
                    <li>📧 Generic sender address</li>
                    <li>🔗 Suspicious link destination</li>
                    <li>⚡ Pressure to act immediately</li>
                </ul>
                <p><strong>Remember:</strong> Always verify security alerts through official channels!</p>
            </div>
        `,
        icon: 'warning',
        confirmButtonText: 'I Understand',
        confirmButtonColor: '#dc3545',
        width: '500px'
    });
}

// Include SweetAlert2 for better alerts
if (!document.querySelector('script[src*="sweetalert2"]')) {
    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
    document.head.appendChild(script);
}
</script>
@endsection
