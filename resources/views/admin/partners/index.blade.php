@extends('admin.layout')

@section('title', 'Manage Partners')

@section('actions')
    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Partner
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body p-0">
            @if ($partners->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px">Logo</th>
                                <th>Partner Name</th>
                                <th>Created</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $partner)
                                <tr>
                                    <td>
                                        <div class="avatar avatar-md bg-light rounded p-1">
                                            <img src="{{ $partner->image_url }}" alt="{{ $partner->name }}" class="img-fluid">
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="mb-0">{{ $partner->name }}</h6>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $partner->created_at->format('M d, Y') }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('admin.partners.show', $partner) }}" class="btn btn-sm btn-light me-1" data-bs-toggle="tooltip"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.partners.edit', $partner) }}"
                                                class="btn btn-sm btn-primary me-1" data-bs-toggle="tooltip"
                                                title="Edit Partner">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ $partner->id }}" title="Delete Partner">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                            @include('admin.partials.delete-modal', [
                                                'id' => $partner->id,
                                                'route' => route('admin.partners.destroy', $partner),
                                                'title' => $partner->name,
                                                'type' => 'partner',
                                            ])
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-3 border-top">
                    {{ $partners->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-handshake fa-4x text-muted opacity-25"></i>
                    </div>
                    <h5>No partners yet</h5>
                    <p class="text-muted">Get started by adding your first partner</p>
                    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Add Partner
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
