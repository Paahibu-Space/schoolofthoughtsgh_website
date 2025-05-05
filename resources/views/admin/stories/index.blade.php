@extends('admin.layout')

@section('title', 'Manage Stories')

@section('actions')
    <a href="{{ route('admin.stories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>New Story
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body p-0">
            @if ($stories->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 60px">Image</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Published</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stories as $story)
                                <tr>
                                    <td>
                                        <img src="{{ $story->image_url }}" alt="{{ $story->title }}" class="img-fluid "
                                            style="width: 50px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <h6 class="mb-1">{{ $story->title }}</h6>
                                        <p class="small text-muted mb-0">{{ $story->excerpt }}</p>
                                    </td>
                                    <td>{{ $story->author->name }}</td>
                                    <td>
                                        @if ($story->published_at && $story->published_at->isPast())
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif

                                        @if ($story->is_featured)
                                            <span class="badge bg-info ms-1">Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $story->published_at ? $story->published_at->format('M d, Y') : '--' }}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="#" class="btn btn-sm btn-light me-1" data-bs-toggle="tooltip"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.stories.edit', $story) }}"
                                                class="btn btn-sm btn-primary me-1" data-bs-toggle="tooltip"
                                                title="Edit Story">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ $story->id }}" title="Delete Story">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                            @include('admin.partials.delete-modal', [
                                                'id' => $story->id,
                                                'route' => route('admin.stories.destroy', $story),
                                                'title' => $story->title,
                                                'type' => 'story',
                                            ])
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-3 border-top">
                    {{ $stories->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-book-open fa-4x text-muted opacity-25"></i>
                    </div>
                    <h5>No stories yet</h5>
                    <p class="text-muted">Get started by creating your first story</p>
                    <a href="{{ route('admin.stories.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Create Story
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
