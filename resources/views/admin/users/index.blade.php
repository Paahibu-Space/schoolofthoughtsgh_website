@extends('admin.layout')

@section('title', 'Manage Users')

@section('styles')
    <style>
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e9ecef;
            color: #495057;
            font-weight: 500;
            margin-right: 10px;
            overflow: hidden;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-status {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 6px;
            display: inline-block;
        }

        .table > :not(caption) > * > * {
            padding: 0.75rem 1rem;
        }

        .search-container {
            max-width: 400px;
        }

        .role-filter .dropdown-menu {
            min-width: 200px;
            padding: 1rem;
        }

        .btn-filter {
            min-width: 140px;
        }
    </style>
@endsection

@section('actions')
    <div class="d-flex align-items-center">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary me-2">
            <i class="fas fa-user-plus me-2"></i>Add New User
        </a>
        {{-- <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="exportDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-download me-2"></i>Export
            </button>
            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                <li><a class="dropdown-item" href="#"><i class="fas fa-file-csv me-2"></i>Export as CSV</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-file-excel me-2"></i>Export as Excel</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf me-2"></i>Export as PDF</a></li>
            </ul>
        </div> --}}
    </div>
@endsection

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-12 mb-3 mb-md-0">
                    <h5 class="mb-0">All Users</h5>
                    <p class="text-muted mb-0">Manage user accounts and permissions</p>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            @if ($users->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th style="width: 35%">User</th>
                                <th style="width: 15%">Role</th>
                                <th style="width: 15%">Status</th>
                                <th style="width: 20%">Created</th>
                                <th style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar">
                                                @if ($user->avatar)
                                                    <img src="{{ asset('storage/' . $user->avatar) }}"
                                                         alt="{{ $user->name }}">
                                                @else
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                @endif
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $user->name }}</h6>
                                                <small class="text-muted">{{ $user->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($user->is_admin)
                                            <span class="badge bg-primary-subtle text-primary">Administrator</span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary">Standard User</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="user-status bg-success"></span>
                                        <span>Active</span>
                                    </td>
                                    <td>
                                        <span>{{ $user->created_at->format('M d, Y') }}</span>
                                        <div class="small text-muted">{{ $user->created_at->diffForHumans() }}</div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                               class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                               data-bs-title="Edit User">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if (auth()->id() !== $user->id)
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteUserModal-{{ $user->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            @endif
                                        </div>

                                        {{-- Delete Modal --}}
                                        @if (auth()->id() !== $user->id)
                                            <div class="modal fade" id="deleteUserModal-{{ $user->id }}" tabindex="-1"
                                                 aria-labelledby="deleteUserModalLabel-{{ $user->id }}"
                                                 aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="modal-content">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title" id="deleteUserModalLabel-{{ $user->id }}">
                                                                Confirm User Deletion
                                                            </h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete <strong>{{ $user->name }}</strong>? This action cannot be undone.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete User</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-muted text-center p-3">No users found.</div>
            @endif
        </div>
    </div>
@endsection
