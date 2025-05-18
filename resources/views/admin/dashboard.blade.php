@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="welcome-icon me-4">
                    <div style="width: 60px; height: 60px; background-color: #4f46e5; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-hand-paper text-white" style="font-size: 24px;"></i>
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
        <div class="card dashboard-card bg-gradient-primary ">
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

<!-- Quick Actions & Recent Users -->
<div class="row">
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
                    <a href="{{ route('admin.blogs.create') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-success-subtle text-success me-3">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">New Blog Post</h6>
                            <small class="text-muted">Write and publish content</small>
                        </div>
                    </a>
                    <a href="{{ route('admin.gallery.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-info-subtle text-info me-3">
                            <i class="fas fa-image"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Upload to Gallery</h6>
                            <small class="text-muted">Add new images to gallery</small>
                        </div>
                    </a>
                    {{-- <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-warning-subtle text-warning me-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Send Newsletter</h6>
                            <small class="text-muted">Create a new campaign</small>
                        </div>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Users Table -->
    <div class="col-lg-8 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Users</h5>
                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                @if($recentUsers->count())
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Joined</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentUsers as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2 bg-{{ $user->is_admin ? 'primary' : 'secondary' }} text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            {{ $user->name }}
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $user->is_admin ? 'primary' : 'secondary' }}">
                                            {{ $user->is_admin ? 'Admin' : 'User' }}
                                        </span>
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
                        <p class="text-muted">New users will appear here when they register.</p>
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
                <h5 class="mb-0">Upcoming Events Preview</h5>
                <a href="{{ route('admin.events.index', ['filter' => 'upcoming']) }}" class="btn btn-sm btn-outline-primary">See All</a>
            </div>
            <div class="card-body">
                @if($upcomingEvents->count())
                    <ul class="list-group list-group-flush">
                        @foreach($upcomingEvents as $event)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $event->title }}</strong><br>
                                <small class="text-muted">{{ $event->start_time?->format('M d, Y h:i A') ?? 'No date set' }}
                                </small>
                            </div>
                            <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-sm btn-outline-secondary">Details</a>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-calendar-day fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No upcoming events.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
