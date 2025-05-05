@extends('admin.layout')

@section('title', $story->title)

@section('actions')
    <a href="{{ route('admin.stories.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Stories
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Story Details</h5>
                    <div>
                        @if($story->published_at && $story->published_at->isPast())
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                        
                        @if($story->is_featured)
                            <span class="badge bg-info ms-2">Featured</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h2>{{ $story->title }}</h2>
                <p class="text-muted mb-4">
                    By {{ $story->author->name }} • 
                    @if($story->published_at)
                        Published on {{ $story->published_at->format('F j, Y \a\t g:i A') }}
                    @else
                        Not published
                    @endif
                </p>
                
                @if($story->image_path)
                    <img src="{{ $story->image_url }}" 
                         alt="{{ $story->title }}" 
                         class="img-fluid rounded mb-4">
                @endif
                
                <div class="content">
                    {!! $story->content !!}
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Story Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.stories.edit', $story) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Story
                    </a>
                    <button type="button" 
                            class="btn btn-outline-danger"
                            data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ $story->id }}">
                        <i class="fas fa-trash-alt me-2"></i>Delete Story
                    </button>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Story Statistics</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span>Created</span>
                        <span>{{ $story->created_at->format('M j, Y') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span>Last Updated</span>
                        <span>{{ $story->updated_at->format('M j, Y') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.delete-modal', [
    'id' => $story->id,
    'route' => route('admin.stories.destroy', $story),
    'title' => $story->title,
    'type' => 'story'
])
@endsection