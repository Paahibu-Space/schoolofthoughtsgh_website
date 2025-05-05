{{-- resources/views/admin/gallery/event.blade.php --}}
@extends('admin.layout')

{{-- @section('title', 'Event Gallery: ' . $event->title) --}}

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <style>
        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 15px;
        }

        .gallery-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        .gallery-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .gallery-caption {
            padding: 10px;
            background-color: #fff;
        }

        .gallery-actions {
            position: absolute;
            top: 5px;
            right: 5px;
            display: flex;
            gap: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-actions {
            opacity: 1;
        }

        .gallery-actions button,
        .gallery-actions a {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .featured-badge {
            position: absolute;
            top: 5px;
            left: 5px;
            background: rgba(255, 193, 7, 0.9);
            color: #000;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
        }

        .empty-gallery {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 0;
        }

        /* Sortable styling */
        .ui-sortable-helper {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        }

        .ui-sortable-placeholder {
            visibility: visible !important;
            background-color: #f8f9fc;
            border: 2px dashed #d1d3e2;
            border-radius: 8px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Gallery: {{ $event->title }}</h1>
                <p class="text-muted">{{ $event->created_at ? $event->created_at->format('d M Y') : 'N/A' }}
                </p>
            </div>
            <div>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to Galleries
                </a>
                <a href="{{ route('admin.gallery.create', $event->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add Images
                </a>
            </div>
        </div>

        {{-- @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif --}}

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Event Gallery</h6>
                @if ($event->galleryImages->count() > 0)
                    <div class="btn-group">
                        <button id="sortModeToggle" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-sort"></i> Sort Images
                        </button>
                        <button id="saveOrder" class="btn btn-sm btn-success d-none">
                            <i class="fas fa-save"></i> Save Order
                        </button>
                        <button id="cancelSort" class="btn btn-sm btn-danger d-none">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                    </div>
                @endif
            </div>
            <div class="card-body">
                @if ($event->galleryImages->count() > 0)
                    <div class="gallery-container" id="sortableGallery">
                        @foreach ($event->galleryImages->sortBy('display_order') as $image)
                            <div class="gallery-item" data-id="{{ $image->id }}">
                                @if ($image->is_featured)
                                    <div class="featured-badge">
                                        <i class="fas fa-star"></i> Featured
                                    </div>
                                @endif

                                <a href="{{ asset('storage/' . $image->image_path) }}" data-lightbox="event-gallery"
                                    data-title="{{ $image->title }}">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}">
                                </a>

                                <div class="gallery-caption">
                                    <h6 class="font-weight-bold mb-0">{{ $image->title ?: 'Untitled' }}</h6>
                                    @if ($image->description)
                                        <small class="text-muted">{{ Str::limit($image->description, 50) }}</small>
                                    @endif
                                </div>

                                <div class="gallery-actions">
                                    <a href="{{ route('admin.gallery.edit', $image->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-{{ $image->id }}" title="Delete Event">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>


                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-gallery">
                        <i class="fas fa-images fa-4x text-gray-300 mb-3"></i>
                        <h5 class="text-gray-500">No gallery images for this event yet</h5>
                        <p class="text-gray-500">Start by adding images to this event's gallery</p>
                        <a href="{{ route('admin.gallery.create', $event->id) }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus"></i> Add Images
                        </a>
                    </div>
                @endif
            </div>
        </div>
        @include('admin.partials.delete-modal', [
                                        'id' => $image->id,
                                        'route' => route('admin.gallery.destroy', $image),
                                        'title' => $event->title,
                                        'type' => 'image',
                                        'additional_warning' =>
                                            'All associated registrations will also be deleted.',
                                    ])
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize lightbox
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true,
                'albumLabel': "Image %1 of %2"
            });

            // Confirm delete
            $('.delete-image').on('click', function(e) {
                if (!confirm('Are you sure you want to delete this image?')) {
                    e.preventDefault();
                }
            });

            // Sort functionality
            let sortMode = false;
            const $gallery = $('#sortableGallery');
            const $sortModeToggle = $('#sortModeToggle');
            const $saveOrder = $('#saveOrder');
            const $cancelSort = $('#cancelSort');

            $sortModeToggle.on('click', function() {
                sortMode = true;
                $gallery.sortable({
                    items: '.gallery-item',
                    placeholder: 'ui-sortable-placeholder',
                    tolerance: 'pointer',
                    cursor: 'move'
                }).sortable('enable');

                $('.gallery-actions').addClass('d-none');
                $sortModeToggle.addClass('d-none');
                $saveOrder.removeClass('d-none');
                $cancelSort.removeClass('d-none');

                // Add visual cue that sort mode is active
                $gallery.addClass('sorting-active');

                // Disable lightbox in sort mode
                $gallery.find('a').on('click', function(e) {
                    if (sortMode) {
                        e.preventDefault();
                    }
                });
            });

            $cancelSort.on('click', function() {
                exitSortMode();
                location.reload(); // Reload to reset the order
            });

            $saveOrder.on('click', function() {
                const imageIds = $gallery.find('.gallery-item').map(function() {
                    return $(this).data('id');
                }).get();

                $.ajax({
                    url: '{{ route('admin.gallery.update-order') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        images: imageIds
                    },
                    success: function(response) {
                        if (response.success) {
                            exitSortMode();

                            // Show success message
                            const successAlert = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Image order updated successfully
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `;

                            $('.container-fluid').first().prepend(successAlert);
                        }
                    }
                });
            });

            function exitSortMode() {
                sortMode = false;
                $gallery.sortable('destroy');
                $('.gallery-actions').removeClass('d-none');
                $sortModeToggle.removeClass('d-none');
                $saveOrder.addClass('d-none');
                $cancelSort.addClass('d-none');
                $gallery.removeClass('sorting-active');
            }
        });
    </script>
@endpush
