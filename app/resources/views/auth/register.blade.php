@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-7 col-lg-5">
            <div class="card shadow-lg border-0">
                <!-- Header with Phishy Branding -->
                <div class="card-header bg-gradient-success text-white text-center py-4 border-0">
                    <div class="mb-2">
                        <i class="fas fa-user-plus fa-3x"></i>
                    </div>
                    <h3 class="mb-0 font-weight-bold">Join Phishy</h3>
                    <p class="mb-0 small">Start Your Cybersecurity Journey</p>
                </div>

                <div class="card-body p-5">
                    <h4 class="text-center mb-4 text-gray-800">Create Your Account</h4>
                    
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <!-- Name Field -->
                        <div class="form-group mb-4">
                            <label for="name" class="form-label text-gray-700">
                                <i class="fas fa-user me-2"></i>Full Name
                            </label>
                            <input id="name" 
                                   type="text" 
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="Enter your full name"
                                   required 
                                   autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label text-gray-700">
                                <i class="fas fa-envelope me-2"></i>Email Address
                            </label>
                            <input id="email" 
                                   type="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="Enter your email address"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="form-group mb-4">
                            <label for="password" class="form-label text-gray-700">
                                <i class="fas fa-lock me-2"></i>Password
                            </label>
                            <div class="input-group">
                                <input id="password" 
                                       type="password" 
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                       name="password" 
                                       placeholder="Create a strong password"
                                       required
                                       onkeyup="checkPasswordStrength()">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                    <i class="fas fa-eye" id="toggleIcon1"></i>
                                </button>
                            </div>
                            
                            <!-- Password Strength Indicator -->
                            <div class="password-strength mt-2" id="passwordStrength" style="display: none;">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" id="strengthBar" role="progressbar" style="width: 0%"></div>
                                </div>
                                <small id="strengthText" class="text-muted"></small>
                            </div>

                            <!-- Password Requirements -->
                            <div class="password-requirements mt-2">
                                <small class="text-muted">Password must contain:</small>
                                <div class="requirements-list">
                                    <small class="requirement" id="req-length">
                                        <i class="fas fa-times text-danger me-1"></i>At least 8 characters
                                    </small>
                                    <small class="requirement" id="req-upper">
                                        <i class="fas fa-times text-danger me-1"></i>Uppercase letter
                                    </small>
                                    <small class="requirement" id="req-lower">
                                        <i class="fas fa-times text-danger me-1"></i>Lowercase letter
                                    </small>
                                    <small class="requirement" id="req-number">
                                        <i class="fas fa-times text-danger me-1"></i>Number
                                    </small>
                                    <small class="requirement" id="req-symbol">
                                        <i class="fas fa-times text-danger me-1"></i>Special character
                                    </small>
                                </div>
                            </div>

                            @error('password')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group mb-4">
                            <label for="password-confirm" class="form-label text-gray-700">
                                <i class="fas fa-lock me-2"></i>Confirm Password
                            </label>
                            <div class="input-group">
                                <input id="password-confirm" 
                                       type="password" 
                                       class="form-control form-control-lg" 
                                       name="password_confirmation" 
                                       placeholder="Confirm your password"
                                       required
                                       onkeyup="checkPasswordMatch()">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password-confirm')">
                                    <i class="fas fa-eye" id="toggleIcon2"></i>
                                </button>
                            </div>
                            <div id="passwordMatch" class="mt-2" style="display: none;">
                                <small id="matchText"></small>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label text-gray-700" for="terms">
                                    I agree to the 
                                    <a href="#" class="text-primary text-decoration-none">Terms of Service</a> 
                                    and 
                                    <a href="#" class="text-primary text-decoration-none">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-success btn-lg shadow-sm register-btn" id="registerBtn" disabled>
                                <i class="fas fa-user-plus me-2"></i>Create Account
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="card-footer bg-light text-center py-3 border-0">
                    <small class="text-muted">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none">
                            <strong>Sign in here</strong>
                        </a>
                    </small>
                </div>
            </div>

            <!-- Security Notice -->
            <div class="text-center mt-4">
                <small class="text-muted">
                    <i class="fas fa-shield-alt me-1"></i>
                    Your data is protected with enterprise-grade security
                </small>
            </div>
        </div>
    </div>
</div>

<style>
/* Enhanced registration page styling */
.bg-gradient-success {
    background: linear-gradient(45deg, #1cc88a, #17a673);
}

.register-btn {
    transition: all 0.3s ease-in-out;
    font-weight: 600;
}

.register-btn:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.register-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.form-control-lg {
    border-radius: 0.5rem;
    border: 2px solid #e3e6f0;
    transition: all 0.3s ease-in-out;
}

.form-control-lg:focus {
    border-color: #1cc88a;
    box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
}

.card {
    border-radius: 1rem;
    overflow: hidden;
}

.text-gray-700 {
    color: #6c757d;
}

.text-gray-800 {
    color: #5a5c69;
}

.password-requirements {
    background-color: #f8f9fa;
    border-radius: 0.375rem;
    padding: 0.75rem;
}

.requirements-list {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.25rem;
}

.requirement {
    display: block;
    transition: all 0.3s ease-in-out;
}

.requirement.valid i {
    color: #1cc88a !important;
}

.requirement.valid i:before {
    content: "\f00c";
}

/* Dark mode support */
[data-bs-theme="dark"] .card {
    background-color: #2c3034;
    border-color: rgba(255,255,255,0.1);
}

[data-bs-theme="dark"] .text-gray-800 {
    color: #e3e6f0;
}

[data-bs-theme="dark"] .text-gray-700 {
    color: #b7b9cc;
}

[data-bs-theme="dark"] .form-control-lg {
    background-color: #3a3f44;
    border-color: rgba(255,255,255,0.1);
    color: #e3e6f0;
}

[data-bs-theme="dark"] .form-control-lg:focus {
    background-color: #3a3f44;
    border-color: #1cc88a;
    color: #e3e6f0;
}

[data-bs-theme="dark"] .card-footer {
    background-color: #3a3f44 !important;
}

[data-bs-theme="dark"] .password-requirements {
    background-color: #3a3f44;
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .card-body {
        padding: 2rem 1.5rem !important;
    }
    
    .requirements-list {
        grid-template-columns: 1fr;
    }
    
    .container {
        padding: 1rem;
    }
}
</style>

<script>
// Password visibility toggle
function togglePassword(fieldId) {
    const passwordField = document.getElementById(fieldId);
    const toggleIcon = document.getElementById(fieldId === 'password' ? 'toggleIcon1' : 'toggleIcon2');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

// Password strength checker
function checkPasswordStrength() {
    const password = document.getElementById('password').value;
    const strengthIndicator = document.getElementById('passwordStrength');
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');
    
    if (password.length === 0) {
        strengthIndicator.style.display = 'none';
        return;
    }
    
    strengthIndicator.style.display = 'block';
    
    let score = 0;
    const requirements = {
        'req-length': password.length >= 8,
        'req-upper': /[A-Z]/.test(password),
        'req-lower': /[a-z]/.test(password),
        'req-number': /[0-9]/.test(password),
        'req-symbol': /[^A-Za-z0-9]/.test(password)
    };
    
    // Update requirement indicators
    Object.keys(requirements).forEach(req => {
        const element = document.getElementById(req);
        if (requirements[req]) {
            element.classList.add('valid');
            element.querySelector('i').className = 'fas fa-check text-success me-1';
            score++;
        } else {
            element.classList.remove('valid');
            element.querySelector('i').className = 'fas fa-times text-danger me-1';
        }
    });
    
    // Update strength bar
    const percentage = (score / 5) * 100;
    strengthBar.style.width = percentage + '%';
    
    if (score <= 2) {
        strengthBar.className = 'progress-bar bg-danger';
        strengthText.textContent = 'Weak';
        strengthText.className = 'text-danger';
    } else if (score <= 3) {
        strengthBar.className = 'progress-bar bg-warning';
        strengthText.textContent = 'Fair';
        strengthText.className = 'text-warning';
    } else if (score <= 4) {
        strengthBar.className = 'progress-bar bg-info';
        strengthText.textContent = 'Good';
        strengthText.className = 'text-info';
    } else {
        strengthBar.className = 'progress-bar bg-success';
        strengthText.textContent = 'Strong';
        strengthText.className = 'text-success';
    }
    
    checkFormValidity();
}

// Password match checker
function checkPasswordMatch() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password-confirm').value;
    const matchIndicator = document.getElementById('passwordMatch');
    const matchText = document.getElementById('matchText');
    
    if (confirmPassword.length === 0) {
        matchIndicator.style.display = 'none';
        return;
    }
    
    matchIndicator.style.display = 'block';
    
    if (password === confirmPassword) {
        matchText.innerHTML = '<i class="fas fa-check text-success me-1"></i>Passwords match';
        matchText.className = 'text-success';
    } else {
        matchText.innerHTML = '<i class="fas fa-times text-danger me-1"></i>Passwords do not match';
        matchText.className = 'text-danger';
    }
    
    checkFormValidity();
}

// Form validity checker
function checkFormValidity() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password-confirm').value;
    const terms = document.getElementById('terms').checked;
    const registerBtn = document.getElementById('registerBtn');
    
    const passwordRequirements = {
        length: password.length >= 8,
        upper: /[A-Z]/.test(password),
        lower: /[a-z]/.test(password),
        number: /[0-9]/.test(password),
        symbol: /[^A-Za-z0-9]/.test(password)
    };
    
    const allRequirementsMet = Object.values(passwordRequirements).every(req => req);
    const passwordsMatch = password === confirmPassword && confirmPassword.length > 0;
    
    if (allRequirementsMet && passwordsMatch && terms) {
        registerBtn.disabled = false;
        registerBtn.classList.remove('btn-outline-success');
        registerBtn.classList.add('btn-success');
    } else {
        registerBtn.disabled = true;
        registerBtn.classList.remove('btn-success');
        registerBtn.classList.add('btn-outline-success');
    }
}

// Terms checkbox listener
document.getElementById('terms').addEventListener('change', checkFormValidity);

// Add loading state to register button
document.getElementById('registerForm').addEventListener('submit', function() {
    const registerBtn = document.getElementById('registerBtn');
    registerBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...';
    registerBtn.disabled = true;
});
</script>
@endsection
