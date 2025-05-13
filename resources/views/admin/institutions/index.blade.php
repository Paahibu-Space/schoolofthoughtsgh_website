@extends('admin.layout')

@section('title', 'Manage Institutions')

@section('actions')
    <a href="{{ route('admin.institutions.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Institution
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body p-0">
            @if ($institutions->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px">Logo</th>
                                <th>Institution Name</th>
                                <th>Website</th>
                                <th>Created</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($institutions as $institution)
                                <tr>
                                    <td>
                                        <div class="avatar avatar-md bg-light rounded p-1">
                                            <img src="{{ $institution->image_url }}" alt="{{ $institution->name }}" class="img-fluid">
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="mb-0">{{ $institution->name }}</h6>
                                    </td>
                                    <td>
                                        @if($institution->website)
                                            <a href="{{ $institution->website }}" target="_blank">
                                                <i class="fas fa-external-link-alt"></i> Visit
                                            </a>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $institution->created_at->format('M d, Y') }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('admin.institutions.show', $institution) }}" 
                                               class="btn btn-sm btn-light me-1" 
                                               data-bs-toggle="tooltip"
                                               title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.institutions.edit', $institution) }}"
                                                class="btn btn-sm btn-primary me-1" 
                                                data-bs-toggle="tooltip"
                                                title="Edit Institution">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-sm btn-danger" 
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $institution->id }}" 
                                                    title="Delete Institution">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                            @include('admin.partials.delete-modal', [
                                                'id' => $institution->id,
                                                'route' => route('admin.institutions.destroy', $institution),
                                                'title' => $institution->name,
                                                'type' => 'institution',
                                            ])
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-3 border-top">
                    {{ $institutions->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-university fa-4x text-muted opacity-25"></i>
                    </div>
                    <h5>No institutions yet</h5>
                    <p class="text-muted">Get started by adding your first institution</p>
                    <a href="{{ route('admin.institutions.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Add Institution
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Initialize tooltips
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection