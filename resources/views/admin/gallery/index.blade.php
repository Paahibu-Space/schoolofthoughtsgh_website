{{-- resources/views/admin/gallery/index.blade.php --}}
@extends('admin.layout')

{{-- @section('title', 'Gallery Management') --}}

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gallery Management</h1>
        </div>
{{-- 
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif --}}

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Events with Galleries</h6>
            </div>
            <div class="card-body">
                @if ($events->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered" id="eventsTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Images</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->created_at ? $event->created_at->format('d M Y') : 'N/A' }}
                                        </td>
                                        <td>
                                            <span>{{ $event->gallery_images_count }}
                                                images</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.gallery.event', $event->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-images"></i> View Gallery
                                            </a>
                                            <a href="{{ route('admin.gallery.create', $event->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fas fa-plus"></i> Add Images
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $events->links() }}
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-images fa-3x text-gray-300 mb-3"></i>
                        <p class="text-gray-500">No events found. Create an event first.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#eventsTable').DataTable({
                "paging": false,
                "info": false,
                "searching": true,
                "order": [
                    [1, 'desc']
                ]
            });
        });
    </script>
@endpush
