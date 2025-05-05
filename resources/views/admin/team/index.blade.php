@extends('admin.layout')

@section('title', 'Team Members')
@section('actions')
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>New Team
    </a>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.css">
    <style>
        .team-photo-preview {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }

        .team-list-item {
            cursor: move;
            transition: background-color 0.2s;
        }

        .team-list-item:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .drag-handle {
            color: #ccc;
            cursor: move;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Manage Team</h5>
                    <div class="text-muted small">Drag to reorder</div>
                </div>
            </div>
            <div class="card-body p-0">
                @if ($teamMembers->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th width="60"></th>
                                    <th width="80">Photo</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="team-members-list">
                                @foreach ($teamMembers as $member)
                                    <tr class="team-list-item" data-id="{{ $member->id }}">
                                        <td class="text-center">
                                            <i class="fas fa-grip-vertical drag-handle"></i>
                                        </td>
                                        <td>
                                            @if ($member->photo)
                                                <img src="{{ asset('storage/' . $member->photo) }}"
                                                    alt="{{ $member->name }}" class="team-photo-preview">
                                            @else
                                                <div
                                                    class="bg-light rounded-circle d-flex align-items-center justify-content-center team-photo-preview">
                                                    <i class="fas fa-user text-secondary"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->role }}</td>
                                        <td>
                                            @if ($member->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-sm btn-light me-1" data-bs-toggle="tooltip"
                                                    title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.team.edit', $member) }}"
                                                    class="btn btn-sm btn-primary me-1" data-bs-toggle="tooltip"
                                                    title="Edit Team">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $member->id }}" title="Delete Team">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                @include('admin.partials.delete-modal', [
                                                    'id' => $member->id,
                                                    'route' => route('admin.team.destroy', $member),
                                                    'title' => $member->name,
                                                    'type' => 'team',
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
                @else
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-muted"></i>
                        </div>
                        <h5>No Team Members</h5>
                        <p class="text-muted">You haven't added any team members yet.</p>
                        <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Add First Team Member
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        document.addTeamListener('DOMContentLoaded', function() {
            const teamList = document.getElementById('team-members-list');

            if (teamList) {
                new Sortable(teamList, {
                    animation: 150,
                    handle: '.drag-handle',
                    onEnd: function() {
                        updateOrder();
                    }
                });
            }

            function updateOrder() {
                const rows = document.querySelectorAll('.team-list-item');
                const order = Array.from(rows).map(row => row.dataset.id);

                fetch('{{ route('admin.team.update-order') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            order: order
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Optional: show success notification
                        }
                    })
                    .catch(error => console.error('Error updating order:', error));
            }
        });
    </script>
@endsection
