@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 w-100">
                <!-- Header with Phishy Branding -->
                <div class="card-header bg-gradient-primary text-white text-center py-4 border-0">
                    <div class="mb-2">
                        <i class="fas fa-shield-alt fa-3x"></i>
                    </div>
                    <h3 class="mb-0 font-weight-bold">Phishy</h3>
                    <p class="mb-0 small">Cybersecurity Training Platform</p>
                </div>

                <div class="card-body p-5">
                    <h4 class="text-center mb-4 text-gray-800">Welcome Back</h4>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                                   placeholder="Enter your email"
                                   required 
                                   autofocus>
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
                                       placeholder="Enter your password"
                                       required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="remember" 
                                       id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-gray-700" for="remember">
                                    Remember me for 30 days
                                </label>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm login-btn">
                                <i class="fas fa-sign-in-alt me-2"></i>Sign In
                            </button>
                        </div>

                        <!-- Forgot Password Link -->
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    <i class="fas fa-question-circle me-1"></i>Forgot your password?
                                </a>
                            </div>
                        @endif
                    </form>
                </div>

                <!-- Footer -->
                <div class="card-footer bg-light text-center py-3 border-0">
                    <small class="text-muted">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-primary text-decoration-none">
                            <strong>Sign up here</strong>
                        </a>
                    </small>
                </div>
            </div>

            <!-- Security Notice -->
            <div class="text-center mt-4">
                <small class="text-muted">
                    <i class="fas fa-lock me-1"></i>
                    Your connection is secured with SSL encryption
                </small>
            </div>
        </div>
    </div>
</div>

<style>
/* Enhanced login page styling */
.bg-gradient-primary {
    background: linear-gradient(45deg, #4e73df, #224abe);
}

.login-btn {
    transition: all 0.3s ease-in-out;
    font-weight: 600;
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.form-control-lg {
    border-radius: 0.5rem;
    border: 2px solid #e3e6f0;
    transition: all 0.3s ease-in-out;
}

.form-control-lg:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.card {
    border-radius: 1rem;
    overflow: hidden;
    max-width: 110vh;
}

.text-gray-700 {
    color: #6c757d;
}

.text-gray-800 {
    color: #5a5c69;
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
    border-color: #4e73df;
    color: #e3e6f0;
}

[data-bs-theme="dark"] .card-footer {
    background-color: #3a3f44 !important;
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .card-body {
        padding: 2rem 1.5rem !important;
    }
    
    .container {
        padding: 1rem;
    }
}
</style>

<script>
// Password visibility toggle
function togglePassword() {
    const passwordField = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
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

// Add loading state to login button
document.querySelector('form').addEventListener('submit', function() {
    const loginBtn = document.querySelector('.login-btn');
    loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Signing In...';
    loginBtn.disabled = true;
});
</script>
@endsection
