@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="welcome-icon me-4">
                    <div style="width: 60px; height: 60px; background-color: #4f46e5; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-hand text-white" style="font-size: 24px;"></i>
                    </div>
                </div>
                <div>
                    <h4 class="mb-1">Welcome back, {{ Auth::user()->name }}!</h4>
                    <p class="text-secondary mb-0">Here's what's happening with your organization today.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card dashboard-card bg-gradient-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="badge bg-light text-primary mb-2">Events</div>
                        <h5 class="card-title">Upcoming Events</h5>
                        <p class="display-6 mb-0">{{ $upcomingEventsCount }}</p>
                    </div>
                    <div class="card-icon">
                        <i class="fas fa-calendar-day fa-2x opacity-75"></i>
                    </div>
                </div>
                <hr class="my-3 opacity-25">
                <a href="{{ route('admin.events.index', ['filter' => 'upcoming']) }}" class="text-white d-flex align-items-center">
                    View all upcoming events <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card dashboard-card bg-gradient-secondary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="badge bg-light text-secondary mb-2">Events</div>
                        <h5 class="card-title">Past Events</h5>
                        <p class="display-6 mb-0">{{ $pastEventsCount }}</p>
                    </div>
                    <div class="card-icon">
                        <i class="fas fa-calendar-check fa-2x opacity-75"></i>
                    </div>
                </div>
                <hr class="my-3 opacity-25">
                <a href="{{ route('admin.events.index', ['filter' => 'past']) }}" class="text-white d-flex align-items-center">
                    View all past events <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card dashboard-card bg-gradient-info">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="badge bg-light text-info mb-2">Users</div>
                        <h5 class="card-title">Registered Users</h5>
                        <p class="display-6 mb-0">{{ $totalUsers }}</p>
                    </div>
                    <div class="card-icon">
                        <i class="fas fa-users fa-2x opacity-75"></i>
                    </div>
                </div>
                <hr class="my-3 opacity-25">
                <a href="{{ route('admin.users.index') }}" class="text-white d-flex align-items-center">
                    Manage all users <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Quick Actions -->
    <div class="col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Quick Actions</h5>
                <i class="fas fa-bolt text-warning"></i>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.events.create') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-primary-subtle text-primary me-3">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Create New Event</h6>
                            <small class="text-muted">Schedule and publish a new event</small>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-success-subtle text-success me-3">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">New Blog Post</h6>
                            <small class="text-muted">Write and publish content</small>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-info-subtle text-info me-3">
                            <i class="fas fa-image"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Upload to Gallery</h6>
                            <small class="text-muted">Add new images to gallery</small>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-warning-subtle text-warning me-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Send Newsletter</h6>
                            <small class="text-muted">Create a new campaign</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Users -->
    <div class="col-lg-8 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Users</h5>
                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                @if($recentUsers->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="border-bottom">User</th>
                                    <th class="border-bottom">Email</th>
                                    <th class="border-bottom">Role</th>
                                    <th class="border-bottom">Joined</th>
                                    <th class="border-bottom text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentUsers as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2 bg-{{ $user->is_admin ? 'primary' : 'secondary' }} text-white rounded-circle">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            {{ $user->name }}
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->is_admin)
                                            <span class="badge bg-primary">Admin</span>
                                        @else
                                            <span class="badge bg-secondary">User</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-users fa-4x text-muted mb-3"></i>
                        <h5>No recent users found</h5>
                        <p class="text-muted">New users will appear here when they register</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Upcoming Events Preview -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Upcoming Events</h5>
                <a href="{{ route('admin.events.index', ['filter' => 'upcoming']) }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="border-bottom">Event</th>
                                    <th class="border-bottom">Date & Time</th>
                                    <th class="border-bottom">Location</th>
                                    <th class="border-bottom">Status</th>
                                    <th class="border-bottom text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($upcomingEvents as $event)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($event->image)
                                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="rounded me-3" style="width: 48px; height: 48px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                                    <i class="fas fa-calendar text-secondary"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-0">{{ $event->title }}</h6>
                                                <small class="text-muted">{{ Str::limit($event->description, 50) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ $event->start_date->format('M d, Y') }}</div>
                                        <small class="text-muted">{{ $event->start_date->format('h:i A') }} - {{ $event->end_date->format('h:i A') }}</small>
                                    </td>
                                    <td>{{ $event->location ?? 'N/A' }}</td>
                                    <td>
                                        @if($event->is_featured)
                                            <span class="badge bg-success">Featured</span>
                                        @else
                                            <span class="badge bg-primary">Upcoming</span>
                                        @endif

                                        @php
                                            $daysUntil = now()->diffInDays($event->start_date, false);
                                        @endphp
                                        
                                        @if($daysUntil >= 0 && $daysUntil <= 7)
                                            <span class="badge bg-warning">Soon</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-calendar-day fa-4x text-muted mb-3"></i>
                        <h5>No upcoming events</h5>
                        <p class="text-muted">Create a new event to get started</p>
                        <a href="{{ route('admin.events.create') }}" class="btn btn-primary mt-2">
                            <i class="fas fa-plus me-2"></i>Create Event
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection