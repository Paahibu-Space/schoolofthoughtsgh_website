{{-- resources/views/admin/gallery/create.blade.php --}}
@extends('admin.layout')

{{-- @section(section: 'title', 'Add Gallery Images') --}}

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<style>
    .dropzone {
        border: 2px dashed #4e73df;
        border-radius: 5px;
        background: #f8f9fc;
    }
    
    .dropzone .dz-message {
        margin: 3em 0;
    }
    
    .dropzone .dz-preview .dz-image {
        border-radius: 8px;
    }
    
    .image-details {
        display: none;
        margin-top: 20px;
        border-top: 1px solid #e3e6f0;
        padding-top: 20px;
    }
    
    .image-preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 20px;
    }
    
    .image-preview-item {
        border: 1px solid #e3e6f0;
        border-radius: 8px;
        padding: 10px;
        width: calc(33.333% - 10px);
    }
    
    .image-preview-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    
    .empty-preview {
        padding: 30px;
        text-align: center;
        color: #858796;
        width: 100%;
    }
    
    @media (max-width: 992px) {
        .image-preview-item {
            width: calc(50% - 10px);
        }
    }
    
    @media (max-width: 576px) {
        .image-preview-item {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Add Gallery Images</h1>
            <p class="text-muted">Event: {{ $event->title }} ({{ $event->created_at ? $event->created_at->format('d M Y') : 'N/A' }})</p>
        </div>
        <div>
            <a href="{{ route('admin.gallery.event', $event->id) }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back to Gallery
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upload Images</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gallery.store', $event->id) }}" method="POST" enctype="multipart/form-data" id="galleryForm">
                @csrf
                
                <div class="form-group">
                    <div id="dropzone" class="dropzone">
                        <div class="dz-message">
                            <i class="fas fa-cloud-upload-alt fa-3x mb-3 text-primary"></i>
                            <h5>Drop files here or click to upload</h5>
                            <p class="text-muted">Upload multiple images at once (JPEG, PNG, GIF)</p>
                        </div>
                    </div>
                </div>

                <div class="image-details" id="imageDetails">
                    <h5 class="mb-4">Image Details</h5>
                    
                    <div class="image-preview-container" id="imagePreviewContainer">
                        <div class="empty-preview">
                            <i class="fas fa-image fa-3x mb-3 text-gray-300"></i>
                            <p>No images selected yet</p>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Gallery Images
                        </button>
                        <button type="button" id="resetBtn" class="btn btn-outline-secondary">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
// First, disable Dropzone auto-discover to prevent conflicts
Dropzone.autoDiscover = false;

$(document).ready(function() {
    let uploadedImages = [];
    
    // Initialize Dropzone with proper URL (use form's action URL)
    const myDropzone = new Dropzone("#dropzone", {
        url: "{{ route('admin.gallery.store', $event->id) }}", // Set the URL to the form's action
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 5,
        maxFiles: 20,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        createImageThumbnails: true,
        thumbnailWidth: 120,
        thumbnailHeight: 120,
        // Add the CSRF token to the request
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    myDropzone.on("addedfile", function(file) {
        const reader = new FileReader();
        
        reader.onload = function(event) {
            const imageId = 'image-' + Date.now() + '-' + uploadedImages.length;
            uploadedImages.push({
                id: imageId,
                file: file,
                src: event.target.result
            });
            
            updateImagePreviewContainer();
        };
        
        reader.readAsDataURL(file);
        
        // Show image details section
        $("#imageDetails").show();
    });
    
    myDropzone.on("removedfile", function(file) {
        // Find and remove the image from our array
        uploadedImages = uploadedImages.filter(img => img.file !== file);
        
        // Update preview
        updateImagePreviewContainer();
        
        // Hide details section if no images left
        if (uploadedImages.length === 0) {
            $("#imageDetails").hide();
        }
    });
    
    function updateImagePreviewContainer() {
        const $container = $("#imagePreviewContainer");
        
        // Clear container
        $container.empty();
        
        if (uploadedImages.length === 0) {
            $container.html(`
                <div class="empty-preview">
                    <i class="fas fa-image fa-3x mb-3 text-gray-300"></i>
                    <p>No images selected yet</p>
                </div>
            `);
            return;
        }
        
        // Add image previews with input fields
        uploadedImages.forEach((img, index) => {
            const $item = $(`
                <div class="image-preview-item" data-id="${img.id}">
                    <img src="${img.src}" alt="Preview">
                    <div class="form-group">
                        <label>Title (optional)</label>
                        <input type="text" name="titles[]" class="form-control form-control-sm" placeholder="Image title">
                    </div>
                    <div class="form-group mb-0">
                        <label>Description (optional)</label>
                        <textarea name="descriptions[]" class="form-control form-control-sm" rows="2" placeholder="Short description"></textarea>
                    </div>
                </div>
            `);
            
            $container.append($item);
        });
    }
    
    // Handle form submission
    $("#galleryForm").on("submit", function(e) {
        e.preventDefault(); // Important: Prevent normal form submission
        
        if (uploadedImages.length === 0) {
            alert("Please select at least one image to upload");
            return;
        }
        
        // Create a FormData object to send with the AJAX request
        const formData = new FormData(this);
        
        // Remove any existing file inputs to avoid duplicates
        formData.delete('images[]');
        
        // Add each file to the form data with the proper name
        uploadedImages.forEach((img, index) => {
            formData.append('images[]', img.file);
            
            // Get the title and description from the inputs in the preview
            const $item = $(`.image-preview-item[data-id="${img.id}"]`);
            const title = $item.find('input[name="titles[]"]').val();
            const description = $item.find('textarea[name="descriptions[]"]').val();
            
            formData.append('titles[]', title || '');
            formData.append('descriptions[]', description || '');
        });
        
        // Submit the form using AJAX with the FormData
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,  // Important for FormData
            contentType: false,  // Important for FormData
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Redirect to the gallery page on success
                window.location.href = response.redirect || "{{ route('admin.gallery.event', $event->id) }}";
            },
            error: function(xhr) {
                // Handle errors
                let errorMessage = "An error occurred while uploading images.";
                
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                alert(errorMessage);
            }
        });
    });
    
    // Reset button
    $("#resetBtn").on("click", function() {
        myDropzone.removeAllFiles(true);
        uploadedImages = [];
        $("#imageDetails").hide();
        updateImagePreviewContainer();
    });
});
</script>
@endpush