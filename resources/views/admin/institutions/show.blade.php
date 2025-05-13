@extends('admin.layout')

@section('title', $institution->name)

@section('actions')
    <a href="{{ route('admin.institutions.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Institutions
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Institution Details</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h4>{{ $institution->name }}</h4>
                </div>
                
                @if($institution->website)
                <div class="mb-4">
                    <h6>Website</h6>
                    <p>
                        <a href="{{ $institution->website }}" target="_blank">
                            {{ $institution->website }}
                        </a>
                    </p>
                </div>
                @endif
                
                @if($institution->description)
                <div class="mb-4">
                    <h6>Description</h6>
                    <p>{{ $institution->description }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Institution Logo</h5>
            </div>
            <div class="card-body text-center">
                <div class="mb-3">
                    @if($institution->image)
                        <img src="{{ asset('storage/'.$institution->image) }}" 
                             class="img-fluid rounded" 
                             style="max-height: 200px;"
                             alt="{{ $institution->name }}">
                    @else
                        <i class="fas fa-university fa-5x text-secondary mb-3"></i>
                        <p class="mb-0">No logo uploaded</p>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.institutions.edit', $institution) }}" 
                       class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Institution
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection