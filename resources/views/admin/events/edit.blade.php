@extends('admin.layout')

@section('title', 'Edit Event')

@section('actions')
<a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">
    <i class="fas fa-arrow-left me-2"></i>Back to Events
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Event Information</h5>
                <span class="badge bg-{{ $event->start_date > now() ? 'primary' : 'secondary' }}">
                    {{ $event->start_date > now() ? 'Upcoming' : 'Past' }} Event
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" id="eventForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title" class="form-label">Event Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $event->title) }}" placeholder="Enter event title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Choose a clear and descriptive title for your event.</div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="form-label">Event Description <span class="text-danger">*</span></label>
                        <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description" rows="6" placeholder="Enter event description" required>{{ old('description', $event->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date & Time <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $event->start_date->format('Y-m-d\TH:i')) }}" required>
                            </div>
                            @error('start_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="end_date" class="form-label">End Date & Time <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $event->end_date->format('Y-m-d\TH:i')) }}" required>
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
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $event->location) }}" placeholder="Enter event location (physical address or 'Online')">
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
                            @if(isset($event->speakers) && count($event->speakers) > 0)
                                @foreach($event->speakers as $index => $speaker)
                                    <div class="card mb-3 speaker-item">
                                        <div class="card-header bg-light d-flex justify-content-between align-items-center py-2">
                                            <h6 class="mb-0 speaker-title">{{ $speaker->name }}</h6>
                                            <button type="button" class="btn btn-sm btn-outline-danger remove-speaker">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="speaker-image-preview text-center bg-light rounded p-2 mb-2">
                                                        <div class="speaker-preview">
                                                            @if($speaker->image)
                                                                <img src="{{ asset('storage/' . $speaker->image) }}" class="img-fluid rounded" style="max-height: 100px;">
                                                            @else
                                                                <i class="fas fa-user fa-2x text-secondary"></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="input-group input-group-sm">
                                                        <input type="file" class="form-control speaker-image" name="speakers[{{ $index }}][image]" accept="image/*">
                                                        <label class="input-group-text"><i class="fas fa-upload"></i></label>
                                                    </div>
                                                    <input type="hidden" name="speakers[{{ $index }}][id]" value="{{ $speaker->id }}">
                                                    <input type="hidden" name="speakers[{{ $index }}][existing_image]" value="{{ $speaker->image }}">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="mb-2">
                                                        <input type="text" class="form-control form-control-sm speaker-name" name="speakers[{{ $index }}][name]" placeholder="Speaker Name" value="{{ $speaker->name }}" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <input type="text" class="form-control form-control-sm" name="speakers[{{ $index }}][role]" placeholder="Role/Position" value="{{ $speaker->role }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <input type="text" class="form-control form-control-sm" name="speakers[{{ $index }}][specialty]" placeholder="Specialty/Expertise" value="{{ $speaker->specialty }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        
                        <!-- Template for new speaker (same as in create form) -->
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
                        <div class="image-preview mb-3 bg-light rounded text-center p-2">
                            <div id="imagePreview">
                                @if($event->image)
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid rounded" style="max-height: 200px;">
                                @else
                                    <div class="p-4">
                                        <i class="fas fa-image fa-3x text-secondary mb-2"></i>
                                        <p class="mb-0">No image selected</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" form="eventForm" accept="image/*">
                            <label class="input-group-text" for="image"><i class="fas fa-upload"></i></label>
                        </div>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Leave empty to keep the current image. Recommended size: 1200x630px</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Event Status</label>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" form="eventForm" {{ old('is_featured', $event->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured Event</label>
                    </div>
                    <div class="form-text">Featured events are highlighted on the website homepage.</div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg" form="eventForm">
                        <i class="fas fa-save me-2"></i>Update Event
                    </button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Event Information</h5>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="text-muted">Created</span>
                        <span>{{ $event->created_at->format('M d, Y H:i') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="text-muted">Last Updated</span>
                        <span>{{ $event->updated_at->format('M d, Y H:i') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="text-muted">Status</span>
                        <span class="badge bg-{{ $event->start_date > now() ? 'primary' : 'secondary' }}">
                            {{ $event->start_date > now() ? 'Upcoming' : 'Past' }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Danger Zone</h5>
            </div>
            <div class="card-body">
                <p class="text-danger mb-3">Deleting this event cannot be undone.</p>
                <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteEventModal">
                    <i class="fas fa-trash-alt me-2"></i>Delete Event
                </button>
                
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteEventModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this event?</p>
                                <p class="text-danger"><strong>This action cannot be undone.</strong></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete Event</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
                imagePreview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="img-fluid rounded" style="max-height: 200px;">`;
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Date validation - ensure end date is after start date
    document.getElementById('eventForm').addEventListener('submit', function(e) {
        const startDate = new Date(document.getElementById('start_date').value);
        const endDate = new Date(document.getElementById('end_date').value);
        
        if (endDate <= startDate) {
            e.preventDefault();
            alert('End date must be after the start date.');
        }
    });
    
    // Initialize WYSIWYG editor for description if needed
    if (typeof ClassicEditor !== 'undefined') {
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const speakersContainer = document.getElementById('speakersContainer');
        const speakerTemplate = document.getElementById('speakerTemplate');
        const addSpeakerBtn = document.getElementById('addSpeakerBtn');
        let speakerCount = {{ isset($event->speakers) ? count($event->speakers) : 0 }};
        
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
        
        // Set up existing speakers
        document.querySelectorAll('.speaker-item').forEach(item => {
            // Set up image preview for existing speakers
            const imageInput = item.querySelector('.speaker-image');
            const previewContainer = item.querySelector('.speaker-preview');
            
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
            const nameInput = item.querySelector('.speaker-name');
            const speakerTitle = item.querySelector('.speaker-title');
            
            nameInput.addEventListener('input', function() {
                speakerTitle.textContent = this.value || 'Speaker';
            });
            
            // Set up remove button
            const removeBtn = item.querySelector('.remove-speaker');
            removeBtn.addEventListener('click', function() {
                this.closest('.speaker-item').remove();
            });
        });
    });
</script>
@endsection