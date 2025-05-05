{{-- resources/views/admin/partials/delete-modal.blade.php --}}
<div class="modal fade" id="deleteModal-{{ $id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                    Confirm Deletion
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this {{ $type ?? 'item' }}?</p>
                <div class="alert alert-danger">
                    <strong class="d-block">"{{ $title }}"</strong>
                    <small class="d-block mt-1">This action cannot be undone.</small>
                </div>
                
                @if(isset($additional_warning))
                    <div class="alert alert-warning small mb-0 mt-3">
                        <i class="fas fa-info-circle me-2"></i>
                        {{ $additional_warning }}
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Cancel
                </button>
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>