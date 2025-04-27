<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Partner Details</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label for="name" class="form-label">Partner Name <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control form-control-lg @error('name') is-invalid @enderror" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $partner->name ?? '') }}" 
                           placeholder="Enter partner name" 
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Partner Logo</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="image-upload-container">
                        <div class="image-preview mb-3 bg-light rounded text-center p-4">
                            <div id="imagePreview">
                                @if(isset($partner) && $partner->image)
                                    <img src="{{ asset('storage/'.$partner->image) }}" 
                                         class="img-fluid rounded" 
                                         style="max-height: 200px;"
                                         alt="{{ $partner->name }}">
                                @else
                                    <i class="fas fa-image fa-3x text-secondary mb-2"></i>
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
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-2"></i>{{ isset($partner) ? 'Update' : 'Create' }} Partner
                    </button>
                    <a href="{{ route('admin.partners.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>