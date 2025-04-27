@extends('admin.layout')

@section('title', 'Edit Partner')

@section('actions')
    <a href="{{ route('admin.partners.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Partners
    </a>
@endsection

@section('content')
<form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.partners.partials.form')
</form>
@endsection

@section('scripts')
<script>
    // Reuse the same image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        // Same as create view
    });
</script>
@endsection