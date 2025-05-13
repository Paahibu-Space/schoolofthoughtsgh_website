@extends('admin.layout')

@section('title', 'Edit Institution: ' . $institution->name)

@section('actions')
    <a href="{{ route('admin.institutions.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Institutions
    </a>
@endsection

@section('content')
<form action="{{ route('admin.institutions.update', $institution) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Institution Details</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label for="name" class="form-label">Institution Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control form-control-lg @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $institution->name) }}" 
                               placeholder="Enter institution name" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" 
                               class="form-control @error('website') is-invalid @enderror" 
                               id="website" 
                               name="website" 
                               value="{{ old('website', $institution->website) }}" 
                               placeholder="https://example.com">
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4"
                                  placeholder="Brief description about the institution">{{ old('description', $institution->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Institution Logo</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="image-upload-container">
                            <div class="image-preview mb-3 bg-light rounded text-center p-4">
                                <div id="imagePreview">
                                    @if($institution->image)
                                        <img src="{{ asset('storage/'.$institution->image) }}" 
                                             class="img-fluid rounded" 
                                             style="max-height: 200px;"
                                             alt="{{ $institution->name }}">
                                    @else
                                        <i class="fas fa-university fa-3x text-secondary mb-2"></i>
                                        <p class="mb-0">No image selected</p>
                                    @endif
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="file" 
                                       class="form-control @error('image') is-invalid @enderror" 
                                       id="image" 
                                       name="image" 
                                       accept="image/*">
                                <label class="input-group-text" for="image">
                                    <i class="fas fa-upload"></i>
                                </label>
                            </div>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Recommended size: 400x400px (1:1 ratio)</div>
                            @if($institution->image)
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image">
                                    <label class="form-check-label" for="remove_image">
                                        Remove current image
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>Update Institution
                        </button>
                        <a href="{{ route('admin.institutions.index') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('File size should not exceed 2MB');
                e.target.value = '';
                return;
            }
            
            if (!file.type.match('image.*')) {
                alert('Please select an image file');
                e.target.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">`;
            }
            reader.readAsDataURL(file);
        } else {
            @if($institution->image)
                preview.innerHTML = `<img src="{{ asset('storage/'.$institution->image) }}" class="img-fluid rounded" style="max-height: 200px;" alt="{{ $institution->name }}">`;
            @else
                preview.innerHTML = `
                    <i class="fas fa-university fa-3x text-secondary mb-2"></i>
                    <p class="mb-0">No image selected</p>
                `;
            @endif
        }
    });
</script>
@endsection