@extends('admin.layout')

@section('title', $event->title)

@section('actions')
<div class="d-flex gap-2">
    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary">
        <i class="fas fa-edit me-2"></i>Edit Event
    </a>
    <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Events
    </a>
</div>
@endsection

@section('content')
<div class="row">
    <!-- Main Event Information Column -->
    <div class="col-lg-8">
        <!-- Event Details Card -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Event Details</h5>
                <span class="badge bg-{{ $event->start_date > now() ? 'primary' : 'secondary' }}">
                    {{ $event->start_date > now() ? 'Upcoming' : 'Past' }} Event
                </span>
            </div>
            
            @if($event->image)
            <div class="event-image">
                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid">
            </div>
            @endif
            
            <div class="card-body">
                <h2 class="mb-3">{{ $event->title }}</h2>
                
                <div class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-light rounded p-3 me-3">
                                    <i class="fas fa-calendar-alt text-primary fa-lg"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Start Date & Time</div>
                                    <div class="fw-bold">{{ $event->start_date->format('M d, Y h:i A') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-light rounded p-3 me-3">
                                    <i class="fas fa-calendar-check text-primary fa-lg"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">End Date & Time</div>
                                    <div class="fw-bold">{{ $event->end_date->format('M d, Y h:i A') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        @if($event->location)
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-light rounded p-3 me-3">
                                    <i class="fas fa-map-marker-alt text-primary fa-lg"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Location</div>
                                    <div class="fw-bold">{{ $event->location }}</div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-light rounded p-3 me-3">
                                    <i class="fas fa-clock text-primary fa-lg"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Duration</div>
                                    <div class="fw-bold">
                                        {{ $event->start_date->diffInHours($event->end_date) }} hours
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="mb-3">Description</h5>
                <div class="description-content mb-4">
                    {!! $event->description !!}
                </div>
                
                <!-- Event Status Badges -->
                <div class="mb-4">
                    @if($event->is_featured)
                    <span class="badge bg-warning me-2">
                        <i class="fas fa-star me-1"></i>Featured
                    </span>
                    @endif
                    
                    <span class="badge bg-{{ $event->start_date > now() ? 'primary' : 'secondary' }} me-2">
                        {{ $event->start_date > now() ? 'Upcoming' : 'Past' }}
                    </span>
                    
                    @if($event->start_date->isToday())
                    <span class="badge bg-success me-2">
                        <i class="fas fa-calendar-day me-1"></i>Today
                    </span>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Speakers Card -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Event Speakers</h5>
                <span class="badge bg-primary">{{ count($event->speakers) }} Speaker(s)</span>
            </div>
            <div class="card-body">
                @if(count($event->speakers) > 0)
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach($event->speakers as $speaker)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body d-flex">
                                        <div class="speaker-image me-3">
                                            @if($speaker->image)
                                                <img src="{{ asset('storage/' . $speaker->image) }}" alt="{{ $speaker->name }}" class="rounded-circle" width="80" height="80" style="object-fit: cover;">
                                            @else
                                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                                    <i class="fas fa-user fa-2x text-secondary"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <h5 class="card-title mb-1">{{ $speaker->name }}</h5>
                                            @if($speaker->role)
                                                <p class="card-subtitle text-muted mb-1">{{ $speaker->role }}</p>
                                            @endif
                                            @if($speaker->specialty)
                                                <p class="card-text text-primary mb-0">
                                                    <i class="fas fa-tag me-1 small"></i>
                                                    {{ $speaker->specialty }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <p class="mb-0">No speakers have been added to this event.</p>
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-primary mt-3">
                            <i class="fas fa-plus me-1"></i>Add Speakers
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Sidebar Column -->
    <div class="col-lg-4">
        <!-- Event Actions Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Event Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Event
                    </a>
                    @if($event->start_date > now())
                        <a href="#" class="btn btn-success">
                            <i class="fas fa-paper-plane me-2"></i>Publish Event
                        </a>
                    @endif
                    <a href="#" class="btn btn-outline-primary">
                        <i class="fas fa-eye me-2"></i>Preview Event
                    </a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteEventModal">
                        <i class="fas fa-trash-alt me-2"></i>Delete Event
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Event Information Card -->
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Event Information</h5>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="text-muted">Event ID</span>
                        <span>{{ $event->id }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="text-muted">Created By</span>
                        <span>{{ $event->created_by ?? 'Admin' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="text-muted">Created At</span>
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
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="text-muted">Featured</span>
                        @if($event->is_featured)
                            <span class="badge bg-warning"><i class="fas fa-star me-1"></i>Yes</span>
                        @else
                            <span class="text-muted">No</span>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Related Information Card -->
        {{-- <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Related Information</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-outline-secondary">
                        <i class="fas fa-users me-2"></i>View Registrations
                    </a>
                    <a href="#" class="btn btn-outline-secondary">
                        <i class="fas fa-chart-line me-2"></i>View Analytics
                    </a>
                </div>
            </div>
        </div> --}}
    </div>
</div>

<!-- Delete Event Modal -->
<div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEventModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the event <strong>"{{ $event->title }}"</strong>?</p>
                <p class="text-danger"><strong>This action cannot be undone.</strong></p>
                <p>The following will also be deleted:</p>
                <ul>
                    <li>{{ count($event->speakers) }} speaker(s)</li>
                    <!-- Add other related items here -->
                </ul>
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
@endsection

@section('scripts')
<script>
    // Initialize tooltips if needed
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endsection