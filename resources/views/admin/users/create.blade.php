@extends('admin.layout')

@section('title', 'Create User')

@section('styles')
<style>
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }
    .input-group-text {
        background-color: #f8f9fa;
    }
    .password-strength-meter {
        height: 5px;
        background: #e9ecef;
        margin-top: 8px;
        border-radius: 3px;
        overflow: hidden;
    }
    .password-strength-meter div {
        height: 100%;
        width: 0;
        transition: width 0.3s ease;
    }
</style>
@endsection

@section('actions')
<a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary">
    <i class="fas fa-arrow-left me-2"></i>Back to Users
</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">
                    <i class="fas fa-user-plus me-2 text-primary"></i>Create New User Account
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.users.store') }}" method="POST" id="createUserForm">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="form-label fw-medium">Full Name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter user's full name" required>
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="form-label fw-medium">Email Address <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter valid email address" required>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                        <div class="form-text">User will use this email address to log in.</div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="password" class="form-label fw-medium">Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter secure password" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength-meter mt-2">
                                <div id="passwordStrength"></div>
                            </div>
                            <div class="form-text mt-1" id="passwordFeedback">Password should be at least 8 characters</div>
                            @error('password')
                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label fw-medium">Confirm Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
                            </div>
                            <div class="form-text" id="passwordMatch"></div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-medium">User Role</label>
                        <div class="bg-light p-3 rounded-3 border">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_admin">
                                    <span class="fw-medium">Admin Privileges</span>
                                    <div class="text-muted small">Can manage all aspects of the system including users, settings, and content.</div>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center pt-3">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            <i class="fas fa-user-plus me-2"></i>Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
    
    // Check password strength
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const meter = document.getElementById('passwordStrength');
        const feedback = document.getElementById('passwordFeedback');
        
        // Criteria
        const length = password.length >= 8;
        const hasUppercase = /[A-Z]/.test(password);
        const hasLowercase = /[a-z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);
        
        // Calculate strength
        let strength = 0;
        if (length) strength += 20;
        if (hasUppercase) strength += 20;
        if (hasLowercase) strength += 20;
        if (hasNumber) strength += 20;
        if (hasSpecial) strength += 20;
        
        // Update meter
        meter.style.width = strength + '%';
        
        // Color based on strength
        if (strength < 40) {
            meter.style.backgroundColor = '#dc3545'; // Weak (red)
            feedback.textContent = 'Weak password - add uppercase, numbers or special characters';
        } else if (strength < 70) {
            meter.style.backgroundColor = '#ffc107'; // Medium (yellow)
            feedback.textContent = 'Moderate password - could be stronger';
        } else {
            meter.style.backgroundColor = '#198754'; // Strong (green)
            feedback.textContent = 'Strong password';
        }
    });
    
    // Check if passwords match
    document.getElementById('password_confirmation').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmPassword = this.value;
        const feedback = document.getElementById('passwordMatch');
        
        if (confirmPassword === '') {
            feedback.textContent = '';
            feedback.className = 'form-text';
        } else if (password === confirmPassword) {
            feedback.textContent = 'Passwords match';
            feedback.className = 'form-text text-success';
        } else {
            feedback.textContent = 'Passwords do not match';
            feedback.className = 'form-text text-danger';
        }
    });
</script>
@endsection