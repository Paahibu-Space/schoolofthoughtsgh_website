@extends('admin.layout')

@section('title', 'Events Management')

@section('actions')
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Create New Event
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header p-0 border-bottom-0">
            <div class="d-flex justify-content-between align-items-center p-3">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ $filter == 'all' ? 'active' : '' }}"
                            href="{{ route('admin.events.index', ['filter' => 'all']) }}">
                            All Events
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $filter == 'upcoming' ? 'active' : '' }}"
                            href="{{ route('admin.events.index', ['filter' => 'upcoming']) }}">
                            Upcoming
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $filter == 'past' ? 'active' : '' }}"
                            href="{{ route('admin.events.index', ['filter' => 'past']) }}">
                            Past
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $filter == 'featured' ? 'active' : '' }}"
                            href="{{ route('admin.events.index', ['filter' => 'featured']) }}">
                            Featured
                        </a>
                    </li>
                </ul>

                {{-- <div class="d-flex">
                    <div class="input-group me-2" style="width: 250px;">
                        <input type="text" class="form-control" placeholder="Search events..."
                            aria-label="Search events">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                        <div class="dropdown-menu dropdown-menu-end p-3" style="width: 300px;">
                            <h6 class="dropdown-header">Filter Events</h6>
                            <div class="mb-3">
                                <label class="form-label">Date Range</label>
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text">From</span>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">To</span>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <select class="form-select form-select-sm">
                                    <option value="">All Locations</option>
                                    <option>Online</option>
                                    <option>Main Hall</option>
                                    <option>Conference Center</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary btn-sm" type="button">Apply Filters</button>
                                <button class="btn btn-outline-secondary btn-sm" type="button">Reset</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="card-body p-0">
            @if ($events->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 40%">Event Details</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Location</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($event->image)
                                                <img src="{{ asset('storage/' . $event->image) }}"
                                                    alt="{{ $event->title }}" class="rounded me-3"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="fas fa-calendar-day text-secondary fa-2x"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-1">{{ $event->title }}</h6>
                                                <p class="text-muted small mb-0">
                                                    {{ Str::limit(strip_tags($event->description), 100) }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-medium">{{ $event->start_date->format('M d, Y') }}</div>
                                        <small class="text-muted">{{ $event->start_date->format('h:i A') }} -
                                            {{ $event->end_date->format('h:i A') }}</small>
                                    </td>
                                    <td>
                                        @if ($event->location)
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                                {{ $event->location }}
                                            </div>
                                        @else
                                            <span class="text-muted">Not specified</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $now = \Carbon\Carbon::now();
                                            $isPast = $event->end_date < $now;
                                            $isOngoing = $event->start_date <= $now && $event->end_date >= $now;
                                            $isUpcoming = $event->start_date > $now;
                                            $isSoon = $isUpcoming && $event->start_date->diffInDays($now) <= 7;
                                        @endphp

                                        @if ($isPast)
                                            <span class="badge bg-secondary">Past</span>
                                        @elseif($isOngoing)
                                            <span class="badge bg-success">Ongoing</span>
                                        @elseif($isSoon)
                                            <span class="badge bg-warning">Soon</span>
                                        @else
                                            <span class="badge bg-primary">Upcoming</span>
                                        @endif

                                        @if ($event->is_featured)
                                            <span class="badge bg-info ms-1">Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('admin.events.show', $event) }}" class="btn btn-sm btn-light me-1" data-bs-toggle="tooltip"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.events.edit', $event) }}"
                                                class="btn btn-sm btn-primary me-1" data-bs-toggle="tooltip"
                                                title="Edit Event">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ $event->id }}" title="Delete Event">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                            @include('admin.partials.delete-modal', [
                                                'id' => $event->id,
                                                'route' => route('admin.events.destroy', $event),
                                                'title' => $event->title,
                                                'type' => 'event',
                                                'additional_warning' =>
                                                    'All associated registrations will also be deleted.',
                                            ])
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-3 border-top">
                    {{ $events->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-calendar-xmark fa-4x text-muted mb-3"></i>
                    <h5>No events found</h5>
                    <p class="text-muted">There are no events matching your criteria</p>
                    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mt-2">
                        <i class="fas fa-plus me-2"></i>Create New Event
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
