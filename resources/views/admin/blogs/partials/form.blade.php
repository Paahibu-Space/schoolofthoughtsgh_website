<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Post Content</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label for="title" class="form-label">Post Title <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control form-control-lg @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $blog->title ?? '') }}" 
                           placeholder="Enter post title" 
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="content" class="form-label">Post Content <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('content') is-invalid @enderror" 
                              id="content" 
                              name="content" 
                              rows="10">{{ old('content', $blog->content ?? '') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Post Settings</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label for="image" class="form-label">Featured Image</label>
                    <div class="image-upload-container">
                        <div class="image-preview mb-3 bg-light rounded text-center p-4">
                            <div id="imagePreview">
                                @if(isset($blog) && $blog->image_path)
                                    <img src="{{ $blog->image_url }}" 
                                         class="img-fluid rounded" 
                                         style="max-height: 200px;"
                                         alt="{{ $blog->title }}">
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
                        <div class="form-text">Recommended size: 1200x630px (16:9 ratio)</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="published_at" class="form-label">Publish Date & Time</label>
                    <input type="datetime-local" 
                           class="form-control @error('published_at') is-invalid @enderror" 
                           id="published_at" 
                           name="published_at" 
                           value="{{ old('published_at', isset($blog) && $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}">
                    @error('published_at')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_featured" 
                               name="is_featured" 
                               value="1"
                               {{ old('is_featured', $blog->is_featured ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured Post</label>
                    </div>
                    <div class="form-text">Featured posts are highlighted on the blog homepage.</div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-2"></i>{{ isset($blog) ? 'Update' : 'Create' }} Post
                    </button>
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>