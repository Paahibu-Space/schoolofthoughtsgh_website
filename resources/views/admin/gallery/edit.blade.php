{{-- resources/views/admin/gallery/edit.blade.php --}}
@extends('admin.layout')

@section('title', 'Edit Gallery Image')

@section('styles')
<style>
    .image-preview {
        margin-bottom: 20px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16);
        position: relative;
    }
    
    .image-preview img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
    }
    
    .custom-file-label::after {
        content: "Browse";
    }
    
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2rem;
    }
    
    .featured-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(255, 193, 7, 0.9);
        color: #000;
        padding: 5px 10px;
        border-radius: 3px;
        font-size: 14px;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Edit Gallery Image</h1>
            <p class="text-muted">Event: {{ $image->event->name }}</p>
        </div>
        <div>
            <a href="{{ route('admin.gallery.event', $image->event_id) }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back to Gallery
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Image Details</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.gallery.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="image-preview">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}" id="imagePreview">
                            @if($image->is_featured)
                                <div class="featured-badge">
                                    <i class="fas fa-star"></i> Featured
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="title">Image Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $image->title) }}">
                            <small class="form-text text-muted">Optional title for the image</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $image->description) }}</textarea>
                            <small class="form-text text-muted">Optional description for the image</small>
                        </div>
                        
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="isFeatured" name="is_featured" value="1" {{ old('is_featured', $image->is_featured) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="isFeatured">Mark as featured image</label>
                            </div>
                            <small class="form-text text-muted">Featured images can be displayed prominently on your website</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Replace Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <small class="form-text text-muted">Leave empty to keep the current image</small>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Image
                            </button>
                            
                            <a href="{{ route('admin.gallery.event', $image->event_id) }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Image Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Event:</strong> {{ $image->event->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Upload Date:</strong> {{ $image->created_at->format('M d, Y h:i A') }}
                    </div>
                    <div class="mb-3">
                        <strong>Last Updated:</strong> {{ $image->updated_at->format('M d, Y h:i A') }}
                    </div>
                    <div class="mb-3">
                        <strong>Display Order:</strong> {{ $image->display_order }}
                    </div>
                    
                    <hr>
                    
                    <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-trash"></i> Delete Image
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // File input display filename
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
            
            // Preview image
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
                
                // Remove featured badge during preview (will be added back if saved with featured checked)
                $('.featured-badge').remove();
            }
        });
        
        // Featured switch toggle animation
        $('#isFeatured').on('change', function() {
            if ($(this).is(':checked')) {
                if ($('.featured-badge').length === 0) {
                    $('.image-preview').append('<div class="featured-badge"><i class="fas fa-star"></i> Featured</div>');
                    $('.featured-badge').hide().fadeIn();
                }
            } else {
                $('.featured-badge').fadeOut(function() {
                    $(this).remove();
                });
            }
        });
    });
</script>
@endpush