@extends('admin.layout')

@section('title', 'Create New Event')

@section('actions')
<a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">
    <i class="fas fa-arrow-left me-2"></i>Back to Events
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Event Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" id="eventForm">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="title" class="form-label">Event Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Enter event title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Choose a clear and descriptive title for your event.</div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="form-label">Event Description <span class="text-danger">*</span></label>
                        <textarea id="content" class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" placeholder="Enter event description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date & Time <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                            </div>
                            @error('start_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="end_date" class="form-label">End Date & Time <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                            </div>
                            @error('end_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="location" class="form-label">Event Location</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" placeholder="Enter event location (physical address or 'Online')">
                        </div>
                        @error('location')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Specify where the event will take place. Leave empty if not applicable.</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Event Speakers</span>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="addSpeakerBtn">
                                <i class="fas fa-plus me-1"></i>Add Speaker
                            </button>
                        </label>
                        
                        <div id="speakersContainer">
                            <!-- Speaker template will be cloned here -->
                        </div>
                        
                        <!-- Template for new speaker -->
                        <template id="speakerTemplate">
                            <div class="card mb-3 speaker-item">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center py-2">
                                    <h6 class="mb-0 speaker-title">New Speaker</h6>
                                    <button type="button" class="btn btn-sm btn-outline-danger remove-speaker">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <div class="speaker-image-preview text-center bg-light rounded p-2 mb-2">
                                                <div class="speaker-preview">
                                                    <i class="fas fa-user fa-2x text-secondary"></i>
                                                </div>
                                            </div>
                                            <div class="input-group input-group-sm">
                                                <input type="file" class="form-control speaker-image" name="speakers[INDEX][image]" accept="image/*">
                                                <label class="input-group-text"><i class="fas fa-upload"></i></label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-2">
                                                <input type="text" class="form-control form-control-sm speaker-name" name="speakers[INDEX][name]" placeholder="Speaker Name" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control form-control-sm" name="speakers[INDEX][role]" placeholder="Role/Position">
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control form-control-sm" name="speakers[INDEX][specialty]" placeholder="Specialty/Expertise">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Event Media & Settings</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label for="image" class="form-label">Event Image</label>
                    <div class="image-upload-container">
                        <div class="image-preview mb-3 bg-light rounded text-center p-4">
                            <div id="imagePreview">
                                <i class="fas fa-image fa-3x text-secondary mb-2"></i>
                                <p class="mb-0">No image selected</p>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" form="eventForm" accept="image/*">
                            <label class="input-group-text" for="image"><i class="fas fa-upload"></i></label>
                        </div>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Recommended size: 1200x630px (16:9 ratio)</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Event Status</label>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" form="eventForm" {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured Event</label>
                    </div>
                    <div class="form-text">Featured events are highlighted on the website homepage.</div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg" form="eventForm">
                        <i class="fas fa-save me-2"></i>Create Event
                    </button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Help & Tips</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6><i class="fas fa-lightbulb text-warning me-2"></i>Creating Effective Events</h6>
                    <ul class="small text-muted ps-4">
                        <li>Use a clear, descriptive title</li>
                        <li>Include all important details in the description</li>
                        <li>Add high-quality images to attract attention</li>
                        <li>Double-check date and time information</li>
                    </ul>
                </div>
                <div class="alert alert-info small mb-0">
                    <i class="fas fa-info-circle me-2"></i>Need help? Check out our <a href="#" class="alert-link">event creation guide</a> for more tips.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">`;
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Add a rich text editor to the description field
    $(document).ready(function() {
        if (typeof ClassicEditor !== 'undefined') {
            ClassicEditor
                .create(document.querySelector('#description'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                    placeholder: 'Describe your event in detail...'
                })
                .catch(error => {
                    console.error(error);
                });
        }
        
        // Form validation
        $('#eventForm').on('submit', function(e) {
            const startDate = new Date($('#start_date').val());
            const endDate = new Date($('#end_date').val());
            
            if (endDate < startDate) {
                e.preventDefault();
                alert('End date cannot be earlier than start date');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const speakersContainer = document.getElementById('speakersContainer');
        const speakerTemplate = document.getElementById('speakerTemplate');
        const addSpeakerBtn = document.getElementById('addSpeakerBtn');
        let speakerCount = 0;
        
        // Function to add a new speaker
        function addSpeaker() {
            const speakerIndex = speakerCount++;
            const speakerNode = speakerTemplate.content.cloneNode(true);
            
            // Update all input names with correct index
            speakerNode.querySelectorAll('[name*="INDEX"]').forEach(input => {
                input.name = input.name.replace('INDEX', speakerIndex);
            });
            
            // Set up image preview
            const imageInput = speakerNode.querySelector('.speaker-image');
            const previewContainer = speakerNode.querySelector('.speaker-preview');
            
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewContainer.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 100px;">`;
                    }
                    reader.readAsDataURL(file);
                }
            });
            
            // Set up name change to update header
            const nameInput = speakerNode.querySelector('.speaker-name');
            const speakerTitle = speakerNode.querySelector('.speaker-title');
            
            nameInput.addEventListener('input', function() {
                speakerTitle.textContent = this.value || 'New Speaker';
            });
            
            // Set up remove button
            const removeBtn = speakerNode.querySelector('.remove-speaker');
            removeBtn.addEventListener('click', function() {
                this.closest('.speaker-item').remove();
            });
            
            // Add to DOM
            speakersContainer.appendChild(speakerNode);
        }
        
        // Add speaker button
        addSpeakerBtn.addEventListener('click', addSpeaker);
    });
</script>
@endsection