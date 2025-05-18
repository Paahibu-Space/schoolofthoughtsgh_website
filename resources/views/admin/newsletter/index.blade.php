@extends('admin.layout')

@section('title', 'Newsletter Subscriptions')

@section('content')
<div class="card">
    <div class="card-body">
        <!-- Search and Filter Form -->
        <form action="{{ route('admin.newsletter.index') }}" method="GET" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search email..." name="search" value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" name="date_from" placeholder="From" value="{{ request('date_from') }}">
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" name="date_to" placeholder="To" value="{{ request('date_to') }}">
                </div>
                <div class="col-md-2">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('admin.newsletter.index') }}" class="btn btn-outline-secondary">Reset</a>
                    </div>
                </div>
            </div>
        </form>
        
        <!-- Export Buttons -->
        <div class="d-flex justify-content-end mb-3">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-download me-1"></i> Export
                </button>
                <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.newsletter.export', array_merge(request()->all(), ['format' => 'csv'])) }}">
                            CSV
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.newsletter.export', array_merge(request()->all(), ['format' => 'excel'])) }}">
                            Excel
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        @if($subscriptions->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>
                                <a href="{{ route('admin.newsletter.index', array_merge(request()->all(), ['sort' => 'email', 'direction' => request('sort') == 'email' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                    Email
                                    @if(request('sort') == 'email')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} ms-1"></i>
                                    @else
                                        <i class="fas fa-sort text-muted ms-1"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('admin.newsletter.index', array_merge(request()->all(), ['sort' => 'is_active', 'direction' => request('sort') == 'is_active' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                    Status
                                    @if(request('sort') == 'is_active')
                                        <i class="fas fa-sort-{{ request('direction') == 'asc' ? 'up' : 'down' }} ms-1"></i>
                                    @else
                                        <i class="fas fa-sort text-muted ms-1"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('admin.newsletter.index', array_merge(request()->all(), ['sort' => 'created_at', 'direction' => request('sort') == 'created_at' && request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                    Subscribed
                                    @if(request('sort') == 'created_at' || !request('sort'))
                                        <i class="fas fa-sort-{{ request('direction', 'desc') == 'asc' ? 'up' : 'down' }} ms-1"></i>
                                    @else
                                        <i class="fas fa-sort text-muted ms-1"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->email }}</td>
                            <td>
                                @if($subscription->is_active)
                                    <span class="badge bg-success">Verified</span>
                                @else
                                    <span class="badge bg-secondary">Not verified</span>
                                @endif
                            </td>
                            <td>{{ $subscription->created_at->format('M j, Y') }}</td>
                            <td class="text-end">
                                <form action="{{ route('admin.newsletter.destroy', $subscription) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this subscription?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-3 border-top">
                {{ $subscriptions->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-envelope fa-4x text-muted mb-3"></i>
                <h5>No newsletter subscribers found</h5>
                @if(request('search') || request('status') || request('date_from') || request('date_to'))
                    <p class="text-muted">Try adjusting your search or filter criteria</p>
                    <a href="{{ route('admin.newsletter.index') }}" class="btn btn-outline-primary mt-2">
                        <i class="fas fa-redo me-1"></i> Reset Filters
                    </a>
                @else
                    <p class="text-muted">No subscribers have joined your newsletter yet</p>
                @endif
            </div>
        @endif
    </div>
</div>
@endsection