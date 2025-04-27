@extends('admin.layout')

@section('title', 'Manage Blog Posts')

@section('actions')
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>New Post
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">
        @if($blogs->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px">Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <td>
                                <img src="{{ $blog->image_url }}" 
                                     alt="{{ $blog->title }}"
                                     class="img-fluid rounded"
                                     style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td>
                                <h6 class="mb-1">{{ $blog->title }}</h6>
                                <p class="small text-muted mb-0">{{ $blog->excerpt }}</p>
                            </td>
                            <td>
                                @if($blog->published_at && $blog->published_at->isPast())
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                                
                                @if($blog->is_featured)
                                    <span class="badge bg-info ms-1">Featured</span>
                                @endif
                            </td>
                            <td>
                                {{ $blog->published_at ? $blog->published_at->format('M d, Y') : '--' }}
                            </td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.blogs.show', $blog) }}" 
                                       class="btn btn-sm btn-outline-primary rounded-circle action-btn"
                                       data-bs-toggle="tooltip" 
                                       title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" 
                                       class="btn btn-sm btn-outline-secondary rounded-circle action-btn"
                                       data-bs-toggle="tooltip" 
                                       title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger rounded-circle action-btn"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal-{{ $blog->id }}"
                                            title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    
                                    @include('admin.partials.delete-modal', [
                                        'id' => $blog->id,
                                        'route' => route('admin.blogs.destroy', $blog),
                                        'title' => $blog->title,
                                        'type' => 'blog post'
                                    ])
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-3 border-top">
                {{ $blogs->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="fas fa-newspaper fa-4x text-muted opacity-25"></i>
                </div>
                <h5>No blog posts yet</h5>
                <p class="text-muted">Get started by creating your first post</p>
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-plus me-2"></i>Create Post
                </a>
            </div>
        @endif
    </div>
</div>
@endsection