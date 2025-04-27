{{-- create.blade.php --}}
@extends('admin.layout')

@section('title', 'Create New Blog Post')

@section('actions')
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Posts
    </a>
@endsection

@section('content')
<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.blogs.partials.form')
</form>
@endsection

@section('scripts')
<script>
    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('File size should not exceed 2MB');
                e.target.value = '';
                return;
            }
            
            if (!file.type.match('image.*')) {
                alert('Please select an image file');
                e.target.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">`;
            }
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = `
                <i class="fas fa-image fa-3x text-secondary mb-2"></i>
                <p class="mb-0">No image selected</p>
            `;
        }
    });


</script>
@endsection