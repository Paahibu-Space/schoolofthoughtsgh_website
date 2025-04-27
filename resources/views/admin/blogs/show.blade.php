@extends('admin.layout')

@section('title', $blog->title)

@section('actions')
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Posts
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Post Details</h5>
                    <div>
                        @if($blog->published_at && $blog->published_at->isPast())
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                        
                        @if($blog->is_featured)
                            <span class="badge bg-info ms-2">Featured</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h2>{{ $blog->title }}</h2>
                <p class="text-muted mb-4">
                    @if($blog->published_at)
                        Scheduled for {{ $blog->published_at->format('F j, Y \a\t g:i A') }}
                    @else
                        Not scheduled
                    @endif
                </p>
                
                @if($blog->image_path)
                    <img src="{{ $blog->image_url }}" 
                         alt="{{ $blog->title }}" 
                         class="img-fluid rounded mb-4">
                @endif
                
                <div class="content">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Post Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Post
                    </a>
                    <button type="button" 
                            class="btn btn-outline-danger"
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal">
                        <i class="fas fa-trash-alt me-2"></i>Delete Post
                    </button>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Post Statistics</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span>Created</span>
                        <span>{{ $blog->created_at->format('M j, Y') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span>Last Updated</span>
                        <span>{{ $blog->updated_at->format('M j, Y') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.delete-modal', [
    'id' => $blog->id,
    'route' => route('admin.blogs.destroy', $blog),
    'title' => $blog->title,
    'type' => 'blog post'
])
@endsection