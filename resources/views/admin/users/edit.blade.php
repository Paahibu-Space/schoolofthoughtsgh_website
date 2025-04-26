@extends('admin.layout')

@section('title', 'Edit User')

@section('styles')
<style>
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }
    .input-group-text {
        background-color: #f8f9fa;
    }
    .avatar-preview {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: #6c757d;
        overflow: hidden;
    }
    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
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
    .user-activity-badge {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }
</style>
@endsection

@section('actions')
<a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary">
    <i class="fas fa-arrow-left me-2"></i>Back to Users
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-user-edit me-2 text-primary"></i>Edit User Account
                </h5>
                <span class="badge bg-{{ $user->is_admin ? 'primary' : 'secondary' }}">
                    {{ $user->is_admin ? 'Administrator' : 'Standard User' }}
                </span>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.users.update', $user) }}" method="POST" id="editUserForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="name" class="form-label fw-medium">Full Name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter user's full name" required>
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="form-label fw-medium">Email Address <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter valid email address" required>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="password" class="form-label fw-medium">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter new password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength-meter mt-2">
                                <div id="passwordStrength"></div>
                            </div>
                            <div class="form-text mt-1">Leave blank to keep current password</div>
                            @error('password')
                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label fw-medium">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                            </div>
                            <div class="form-text" id="passwordMatch"></div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-medium">User Role</label>
                        <div class="bg-light p-3 rounded-3 border">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
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
                            <i class="fas fa-save me-2"></i>Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">User Information</h5>
            </div>
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <div class="avatar-preview mx-auto mb-3">
                        @if(isset($user->avatar))
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}">
                        @else
                            <div class="initials">{{ substr($user->name, 0, 1) }}</div>
                        @endif
                    </div>
                    <h5 class="mb-1">{{ $user->name }}</h5>
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
                
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted">Account Created</span>
                        <span>{{ $user->created_at->format('M d, Y') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted">Last Updated</span>
                        <span>{{ $user->updated_at->format('M d, Y') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted">Status</span>
                        <span>
                            <span class="user-activity-badge bg-success"></span>Active
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        
        @if(auth()->id() !== $user->id)
        <div class="card border-danger shadow-sm">
            <div class="card-header bg-danger text-white py-3">
                <h5 class="card-title mb-0">Danger Zone</h5>
            </div>
            <div class="card-body p-4">
                <p class="text-danger mb-3">Permanently delete this user account and all associated data. This action cannot be undone.</p>
                <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                    <i class="fas fa-trash-alt me-2"></i>Delete User Account
                </button>
                
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="deleteUserModalLabel">Confirm User Deletion</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
                                    <h5>Are you sure you want to delete this user?</h5>
                                    <p class="mb-0 text-muted">{{ $user->name }} ({{ $user->email }})</p>
                                </div>
                                <p>This will permanently remove the user account and all associated data from the system. This action <strong>cannot</strong> be undone.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt me-2"></i>Delete User
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
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
        if (password === '') {
            meter.style.width = '0%';
        } else if (strength < 40) {
            meter.style.backgroundColor = '#dc3545'; // Weak (red)
        } else if (strength < 70) {
            meter.style.backgroundColor = '#ffc107'; // Medium (yellow)
        } else {
            meter.style.backgroundColor = '#198754'; // Strong (green)
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