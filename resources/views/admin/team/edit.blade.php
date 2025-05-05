@extends('admin.layout')

@section('title', 'Edit Team Member')
@section('actions')
    <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Team Members
    </a>
@endsection

@section('styles')
<style>
    .team-form-container {
        max-width: 900px;
        margin: 0 auto;
    }
    .photo-upload-container {
        position: relative;
        width: 180px;
        margin: 0 auto;
    }
    .photo-preview {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }
    .photo-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .photo-upload-icon {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 40px;
        height: 40px;
        background-color: var(--bs-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        transition: all 0.2s ease;
    }
    .photo-upload-icon:hover {
        transform: scale(1.05);
    }
    .form-section {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        padding: 28px;
        margin-bottom: 24px;
    }
    .form-section-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #2b3035;
        display: flex;
        align-items: center;
    }
    .form-section-title i {
        margin-right: 10px;
        opacity: 0.8;
    }
    .social-input {
        background-color: #f8f9fa;
        border-left: none;
    }
    .social-input:focus {
        background-color: #fff;
    }
    .social-icon-prepend {
        min-width: 45px;
        display: flex;
        justify-content: center;
        background-color: #f8f9fa;
        border-right: none;
    }
    .form-floating > .form-control:focus ~ label {
        color: var(--bs-primary);
    }
    .char-counter {
        font-size: 12px;
        color: #6c757d;
        text-align: right;
        margin-top: 5px;
    }
    #fileInput {
        display: none;
    }
    .status-toggle {
        padding: 0.45rem 1rem;
        border-radius: 50px;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .status-toggle.active {
        background-color: rgba(25, 135, 84, 0.15);
        color: #198754;
    }
    .status-toggle.inactive {
        background-color: rgba(108, 117, 125, 0.15);
        color: #6c757d;
    }
    .btn-save {
        padding: 0.6rem 1.5rem;
        font-weight: 500;
    }
</style>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="team-form-container">
        <form action="{{ route('admin.team.update', $teamMember) }}" method="POST" enctype="multipart/form-data" id="teamForm">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="form-section h-100">
                        <div class="text-center mb-4">
                            <label for="fileInput" class="photo-upload-container">
                                <div class="photo-preview" id="photoPreview">
                                    @if($teamMember->photo)
                                        <img src="{{ asset('storage/' . $teamMember->photo) }}" alt="{{ $teamMember->name }}">
                                    @else
                                        <i class="fas fa-user fa-3x text-muted"></i>
                                    @endif
                                </div>
                                <div class="photo-upload-icon">
                                    <i class="fas fa-camera"></i>
                                </div>
                            </label>
                            <input type="file" id="fileInput" name="photo" accept="image/*" class="@error('photo') is-invalid @enderror">
                            <div class="mt-2">
                                <label class="form-label text-muted small">Profile Photo (Optional)</label>
                                @error('photo')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <div class="form-section-title">
                                <i class="fas fa-sliders-h"></i> Display Settings
                            </div>
                            
                            <div class="mb-3">
                                <label for="display_order" class="form-label">Display Order</label>
                                <input type="number" class="form-control @error('display_order') is-invalid @enderror" id="display_order" name="display_order" value="{{ old('display_order', $teamMember->display_order) }}">
                                <div class="form-text small">Lower numbers appear first</div>
                                @error('display_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label d-block">Status</label>
                                <div class="btn-group w-100" role="group">
                                    <input type="radio" class="btn-check" name="is_active" id="active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success w-50" for="active">Active</label>
                                    
                                    <input type="radio" class="btn-check" name="is_active" id="inactive" value="0" {{ old('is_active', $teamMember->is_active) ? '' : 'checked' }}>
                                    <label class="btn btn-outline-secondary w-50" for="inactive">Inactive</label>
                                </div>
                                <div class="form-text small">Inactive members are hidden from the website</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-user-circle"></i> Basic Information
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full Name" value="{{ old('name', $teamMember->name) }}" required>
                                    <label for="name">Full Name<span class="text-danger">*</span></label>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" placeholder="Role/Position" value="{{ old('role', $teamMember->role) }}" required>
                                    <label for="role">Role/Position<span class="text-danger">*</span></label>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Short Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" maxlength="500" placeholder="Brief description about this team member">{{ old('description', $teamMember->description) }}</textarea>
                                <div class="char-counter">
                                    <span id="charCount">{{ strlen(old('description', $teamMember->description)) }}</span>/500 characters
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-share-alt"></i> Social Media
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="linkedin_url" class="form-label">LinkedIn</label>
                                <div class="input-group">
                                    <span class="input-group-text social-icon-prepend border">
                                        <i class="fab fa-linkedin-in text-primary"></i>
                                    </span>
                                    <input type="url" class="form-control social-input @error('linkedin_url') is-invalid @enderror" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $teamMember->linkedin_url) }}" placeholder="https://linkedin.com/in/username">
                                    @error('linkedin_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="github_url" class="form-label">GitHub</label>
                                <div class="input-group">
                                    <span class="input-group-text social-icon-prepend border">
                                        <i class="fab fa-github text-dark"></i>
                                    </span>
                                    <input type="url" class="form-control social-input @error('github_url') is-invalid @enderror" id="github_url" name="github_url" value="{{ old('github_url', $teamMember->github_url) }}" placeholder="https://github.com/username">
                                    @error('github_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="twitter_url" class="form-label">Twitter / X</label>
                                <div class="input-group">
                                    <span class="input-group-text social-icon-prepend border">
                                        <i class="fab fa-twitter text-info"></i>
                                    </span>
                                    <input type="url" class="form-control social-input @error('twitter_url') is-invalid @enderror" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $teamMember->twitter_url) }}" placeholder="https://twitter.com/username">
                                    @error('twitter_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="instagram_url" class="form-label">Instagram</label>
                                <div class="input-group">
                                    <span class="input-group-text social-icon-prepend border">
                                        <i class="fab fa-instagram text-danger"></i>
                                    </span>
                                    <input type="url" class="form-control social-input @error('instagram_url') is-invalid @enderror" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $teamMember->instagram_url) }}" placeholder="https://instagram.com/username">
                                    @error('instagram_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-save">
                            <i class="fas fa-save me-1"></i> Update Team Member
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Photo upload preview
    const fileInput = document.getElementById('fileInput');
    const photoPreview = document.getElementById('photoPreview');
    
    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                photoPreview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
            }
            
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Character counter for description
    const descriptionField = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    
    function updateCharCount() {
        const currentLength = descriptionField.value.length;
        charCount.textContent = currentLength;
        
        if (currentLength > 450) {
            charCount.classList.add('text-warning');
        } else {
            charCount.classList.remove('text-warning');
        }
    }
    
    descriptionField.addEventListener('input', updateCharCount);
    updateCharCount(); // Initialize on page load
    
    // Form validation enhancement
    const form = document.getElementById('teamForm');
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>
@endsection