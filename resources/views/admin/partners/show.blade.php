@extends('admin.layout')

@section('title', $partner->name)

@section('actions')
    <a href="{{ route('admin.partners.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Partners
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Partner Details</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h2>{{ $partner->name }}</h2>
                    <p class="text-muted">Added {{ $partner->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Partner Logo</h5>
            </div>
            <div class="card-body text-center">
                <div class="partner-logo mb-3">
                    <img src="{{ $partner->image_url }}" 
                         alt="{{ $partner->name }}" 
                         class="img-fluid rounded"
                         style="max-width: 100%; max-height: 300px;">
                </div>
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <button type="button" 
                            class="btn btn-outline-danger"
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal">
                        <i class="fas fa-trash-alt me-2"></i>Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.delete-modal', [
    'id' => $partner->id,
    'route' => route('admin.partners.destroy', $partner),
    'title' => $partner->name,
    'type' => 'partner'
])
@endsection