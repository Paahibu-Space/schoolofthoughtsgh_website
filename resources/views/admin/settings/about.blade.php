@extends('admin.layout')

@section('styles')
    <style>
        .icon-btn {
            transition: all 0.2s;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .icon-btn i {
            font-size: 1.5rem;
        }

        .icon-btn.selected {
            border-color: #0d6efd;
            background-color: #0d6efd;
            color: white;
        }

        .icon-picker-container {
            max-height: 400px;
            overflow-y: auto;
        }

        .icon-preview,
        .edit-icon-preview {
            min-width: 40px;
            text-align: center;
        }
    </style>
@endsection
@section('title', 'About Page Settings')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">About Page Settings</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.settings.about.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab"
                                        data-bs-target="#general" type="button" role="tab" aria-controls="general"
                                        aria-selected="true">General</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="mission-tab" data-bs-toggle="tab" data-bs-target="#mission"
                                        type="button" role="tab" aria-controls="mission"
                                        aria-selected="false">Mission</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="vision-tab" data-bs-toggle="tab" data-bs-target="#vision"
                                        type="button" role="tab" aria-controls="vision"
                                        aria-selected="false">Vision</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="impact-tab" data-bs-toggle="tab" data-bs-target="#impact"
                                        type="button" role="tab" aria-controls="impact"
                                        aria-selected="false">Impact</button>
                                </li>
                            </ul>

                            <div class="tab-content p-3 border border-top-0 rounded-bottom" id="myTabContent">
                                <!-- General Tab -->
                                <div class="tab-pane fade show active" id="general" role="tabpanel"
                                    aria-labelledby="general-tab">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Page Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title', $pageSetting->title) }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="breadcrumb_image" class="form-label">Breadcrumb Background Image</label>
                                        <input type="file"
                                            class="form-control @error('breadcrumb_image') is-invalid @enderror"
                                            id="breadcrumb_image" name="breadcrumb_image">
                                        @error('breadcrumb_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        @if ($pageSetting->breadcrumb_image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $pageSetting->breadcrumb_image) }}"
                                                    alt="Breadcrumb Image" class="img-thumbnail" style="max-height: 100px">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="general_content" class="form-label">General Content</label>
                                        <textarea class="form-control @error('general_content') is-invalid @enderror" id="general_content"
                                            name="general_content" rows="5">{{ old('general_content', $generalSection->content ?? '') }}</textarea>
                                        @error('general_content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Mission Tab -->
                                <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                                    <div class="mb-3">
                                        <label for="mission_content" class="form-label">Mission Content</label>
                                        <textarea class="form-control @error('mission_content') is-invalid @enderror" id="mission_content"
                                            name="mission_content" rows="5">{{ old('mission_content', $missionSection->content ?? '') }}</textarea>
                                        @error('mission_content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="mission_image" class="form-label">Mission Image</label>
                                        <input type="file"
                                            class="form-control @error('mission_image') is-invalid @enderror"
                                            id="mission_image" name="mission_image">
                                        @error('mission_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        @if ($missionSection->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $missionSection->image) }}"
                                                    alt="Mission Image" class="img-thumbnail" style="max-height: 100px">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Vision Tab -->
                                <div class="tab-pane fade" id="vision" role="tabpanel" aria-labelledby="vision-tab">
                                    <div class="mb-3">
                                        <label for="vision_content" class="form-label">Vision Content</label>
                                        <textarea class="form-control @error('vision_content') is-invalid @enderror" id="vision_content"
                                            name="vision_content" rows="5">{{ old('vision_content', $visionSection->content ?? '') }}</textarea>
                                        @error('vision_content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="vision_image" class="form-label">Vision Image</label>
                                        <input type="file"
                                            class="form-control @error('vision_image') is-invalid @enderror"
                                            id="vision_image" name="vision_image">
                                        @error('vision_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        @if ($visionSection->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $visionSection->image) }}"
                                                    alt="Vision Image" class="img-thumbnail" style="max-height: 100px">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Impact Tab -->
                                <div class="tab-pane fade" id="impact" role="tabpanel" aria-labelledby="impact-tab">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Impact Items</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="alert alert-info">
                                                <p>You can add up to 4 impact items. The items will be displayed in the
                                                    order shown below.</p>
                                            </div>

                                            <!-- Impact Items List -->
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th width="10%">Order</th>
                                                            <th width="20%">Icon</th>
                                                            <th width="15%">Count</th>
                                                            <th width="25%">Title</th>
                                                            <th width="20%">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="impact-items-table">
                                                        @forelse($impactItems as $item)
                                                            <tr data-id="{{ $item->id }}">
                                                                <td>
                                                                    <span class="handle btn btn-sm btn-light">
                                                                        <i class="fas fa-arrows-alt"></i>
                                                                    </span>
                                                                </td>
                                                                <td><i class="{{ $item->icon }}"></i>
                                                                    {{ $item->icon }}</td>
                                                                <td>{{ $item->count }}</td>
                                                                <td>{{ $item->title }}</td>
                                                                {{-- <td>
                                                                    @if ($item->is_active)
                                                                        <span class="badge bg-success">Active</span>
                                                                    @else
                                                                        <span class="badge bg-danger">Inactive</span>
                                                                    @endif
                                                                </td> --}}
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-primary edit-item"
                                                                        data-id="{{ $item->id }}"
                                                                        data-icon="{{ $item->icon }}"
                                                                        data-count="{{ $item->count }}"
                                                                        data-title="{{ $item->title }}"
                                                                        data-active="{{ $item->is_active ? '1' : '0' }}">
                                                                        <i class="fas fa-edit"></i>
                                                                    </button>
                                                                    {{-- <form action="{{ route('admin.settings.about.impact-items.delete', $item->id) }}" 
                                                                      method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form> --}}
                                                                    <button type="button" class="btn btn-sm btn-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal-{{ $item->id }}"
                                                                        title="Delete Event">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>


                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6" class="text-center">No impact items
                                                                    found.</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="mt-3">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#addImpactItemModal">
                                                    <i class="fas fa-plus"></i> Add New Impact Item
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                        @foreach ($impactItems as $item)
                            @include('admin.partials.delete-modal', [
                                'id' => $item->id,
                                'route' => route('admin.settings.about.impact-items.delete', $item),
                                'title' => $item->title,
                                'type' => 'item',
                                'additional_warning' => 'All associated registrations will also be deleted.',
                            ])
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Impact Item Modal -->
    <div class="modal fade" id="addImpactItemModal" tabindex="-1" aria-labelledby="addImpactItemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.settings.about.impact-items.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addImpactItemModalLabel">Add New Impact Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon</label>
                            <div class="input-group">
                                <span class="input-group-text icon-preview"><i class="fas fa-question"></i></span>
                                <input type="text" class="form-control" id="icon" name="icon"
                                    value="fas fa-question" required readonly>
                                <button class="btn btn-outline-secondary" type="button" id="iconPickerBtn">
                                    Select Icon
                                </button>
                            </div>
                            <div class="form-text">Click "Select Icon" to choose from available Font Awesome icons.</div>
                        </div>
                        <div class="mb-3">
                            <label for="count" class="form-label">Count</label>
                            <input type="number" class="form-control" id="count" name="count" required>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        {{-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Impact Item Modal -->
    <div class="modal fade" id="editImpactItemModal" tabindex="-1" aria-labelledby="editImpactItemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editImpactItemForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editImpactItemModalLabel">Edit Impact Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_icon" class="form-label">Icon</label>
                            <div class="input-group">
                                <span class="input-group-text edit-icon-preview"><i class="fas fa-question"></i></span>
                                <input type="text" class="form-control" id="edit_icon" name="icon" required
                                    readonly>
                                <button class="btn btn-outline-secondary" type="button" id="editIconPickerBtn">
                                    Select Icon
                                </button>
                            </div>
                            <div class="form-text">Click "Select Icon" to choose from available Font Awesome icons.</div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_count" class="form-label">Count</label>
                            <input type="number" class="form-control" id="edit_count" name="count" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit_title" name="title" required>
                        </div>
                        {{-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="edit_is_active" name="is_active">
                            <label class="form-check-label" for="edit_is_active">Active</label>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Icon Picker Modal -->
    <div class="modal fade" id="iconPickerModal" tabindex="-1" aria-labelledby="iconPickerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="iconPickerModalLabel">Select an Icon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="iconSearch" placeholder="Search icons...">
                    </div>
                    <div class="icon-picker-container">
                        <!-- Common Font Awesome Icons -->
                        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3" id="iconGrid">
                            <!-- Icons will be loaded here via JS -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="selectIconBtn">Select</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Icon data
        const faIcons = [
        'fas fa-user', 'fas fa-users', 'fas fa-home', 'fas fa-briefcase', 'fas fa-globe',
        'fas fa-chart-bar', 'fas fa-chart-line', 'fas fa-heart', 'fas fa-star', 'fas fa-award',
        'fas fa-trophy', 'fas fa-medal', 'fas fa-certificate', 'fas fa-check', 'fas fa-check-circle',
        'fas fa-thumbs-up', 'fas fa-handshake', 'fas fa-hands-helping', 'fas fa-hand-holding-heart',
        'fas fa-hand-holding-usd', 'fas fa-dollar-sign', 'fas fa-money-bill', 'fas fa-coins',
        'fas fa-seedling', 'fas fa-tree', 'fas fa-leaf', 'fas fa-recycle', 'fas fa-solar-panel',
        'fas fa-lightbulb', 'fas fa-graduation-cap', 'fas fa-book', 'fas fa-university',
        'fas fa-building', 'fas fa-city', 'fas fa-industry', 'fas fa-hospital', 'fas fa-medkit',
        'fas fa-stethoscope', 'fas fa-heartbeat', 'fas fa-head-side-mask', 'fas fa-hands-wash',
        'fas fa-people-arrows', 'fas fa-people-carry', 'fas fa-child', 'fas fa-baby',
        'fas fa-wheelchair', 'fas fa-peace', 'fas fa-dove', 'fas fa-hands', 'fas fa-fist-raised',
        'fas fa-hamburger', 'fas fa-utensils', 'fas fa-apple-alt', 'fas fa-carrot',
        'fas fa-wheat', 'fas fa-tractor', 'fas fa-truck', 'fas fa-plane', 'fas fa-ship',
        'fas fa-earth-americas', 'fas fa-place-of-worship', 'fas fa-praying-hands'
    ];
    
        let selectedIcon = '';
        let currentTargetInput = null;
        let currentIconPreview = null;
    
        // Populate icon grid
        function populateIconGrid(icons) {
            const iconGrid = document.getElementById('iconGrid');
            if (!iconGrid) return;
    
            iconGrid.innerHTML = '';
    
            icons.forEach(icon => {
                const iconDiv = document.createElement('div');
                iconDiv.className = 'col';
    
                const iconBtn = document.createElement('button');
                iconBtn.className = 'btn btn-outline-secondary icon-btn w-100 py-3';
                iconBtn.dataset.icon = icon;
                iconBtn.type = 'button';
                iconBtn.innerHTML = `<i class="${icon}"></i><div class="small text-truncate mt-2">${icon}</div>`;
    
                iconBtn.addEventListener('click', function(e) {
                    e.preventDefault();
    
                    // Remove selected class from all buttons
                    document.querySelectorAll('.icon-btn').forEach(btn => {
                        btn.classList.remove('selected', 'btn-primary');
                        btn.classList.add('btn-outline-secondary');
                    });
    
                    // Add selected class to this button
                    this.classList.remove('btn-outline-secondary');
                    this.classList.add('selected', 'btn-primary');
    
                    // Store selected icon
                    selectedIcon = this.dataset.icon;
                });
    
                iconDiv.appendChild(iconBtn);
                iconGrid.appendChild(iconDiv);
            });
        }
    
        // Search icons functionality
        const iconSearch = document.getElementById('iconSearch');
        if (iconSearch) {
            iconSearch.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const filteredIcons = faIcons.filter(icon =>
                    icon.toLowerCase().includes(searchTerm)
                );
                populateIconGrid(filteredIcons);
            });
        }
    
        // Initialize Bootstrap modals
        const iconPickerModal = document.getElementById('iconPickerModal');
        const addImpactItemModal = document.getElementById('addImpactItemModal');
        const editImpactItemModal = document.getElementById('editImpactItemModal');
        
        if (iconPickerModal) {
            const iconPickerModalInstance = new bootstrap.Modal(iconPickerModal);
            
            // Handle icon picker button click for Add form
            const iconPickerBtn = document.getElementById('iconPickerBtn');
            if (iconPickerBtn) {
                iconPickerBtn.addEventListener('click', function(e) {
                    e.preventDefault();
    
                    currentTargetInput = document.getElementById('icon');
                    currentIconPreview = document.querySelector('.icon-preview i');
                    selectedIcon = currentTargetInput.value;
    
                    // Pre-select the current icon
                    populateIconGrid(faIcons);
    
                    // Pre-select the current icon in the grid
                    setTimeout(() => {
                        const currentIconBtn = document.querySelector(`.icon-btn[data-icon="${selectedIcon}"]`);
                        if (currentIconBtn) {
                            currentIconBtn.classList.remove('btn-outline-secondary');
                            currentIconBtn.classList.add('selected', 'btn-primary');
                        }
                    }, 100);
    
                    iconPickerModalInstance.show();
                });
            }
            
            // Handle icon picker button click for Edit form
            const editIconPickerBtn = document.getElementById('editIconPickerBtn');
            if (editIconPickerBtn) {
                editIconPickerBtn.addEventListener('click', function(e) {
                    e.preventDefault();
    
                    currentTargetInput = document.getElementById('edit_icon');
                    currentIconPreview = document.querySelector('.edit-icon-preview i');
                    selectedIcon = currentTargetInput.value;
    
                    // Pre-select the current icon
                    populateIconGrid(faIcons);
    
                    // Pre-select the current icon in the grid
                    setTimeout(() => {
                        const currentIconBtn = document.querySelector(`.icon-btn[data-icon="${selectedIcon}"]`);
                        if (currentIconBtn) {
                            currentIconBtn.classList.remove('btn-outline-secondary');
                            currentIconBtn.classList.add('selected', 'btn-primary');
                        }
                    }, 100);
    
                    iconPickerModalInstance.show();
                });
            }
            
            // Handle select button click
            const selectIconBtn = document.getElementById('selectIconBtn');
            if (selectIconBtn) {
                selectIconBtn.addEventListener('click', function(e) {
                    e.preventDefault();
    
                    if (selectedIcon && currentTargetInput) {
                        currentTargetInput.value = selectedIcon;
                        if (currentIconPreview) {
                            currentIconPreview.className = selectedIcon;
                        }
    
                        iconPickerModalInstance.hide();
                    }
                });
            }
        }
        
        // Handle Edit Button Click - Use event delegation
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('edit-item') || e.target.closest('.edit-item')) {
                e.preventDefault();
    
                const btn = e.target.classList.contains('edit-item') ? e.target : e.target.closest('.edit-item');
                const id = btn.dataset.id;
                const icon = btn.dataset.icon;
                const count = btn.dataset.count;
                const title = btn.dataset.title;
                // const isActive = btn.dataset.active === '1';
    
                const editForm = document.getElementById('editImpactItemForm');
                if (!editForm) return;
    
                // Set form action
                editForm.action = `/admin/settings/about/impact-items/${id}`;
    
                // Populate form fields
                const editIcon = document.getElementById('edit_icon');
                const editIconPreview = document.querySelector('.edit-icon-preview i');
                const editCount = document.getElementById('edit_count');
                const editTitle = document.getElementById('edit_title');
                // const editIsActive = document.getElementById('edit_is_active');
    
                if (editIcon) editIcon.value = icon;
                if (editIconPreview) editIconPreview.className = icon;
                if (editCount) editCount.value = count;
                if (editTitle) editTitle.value = title;
                // if (editIsActive) editIsActive.checked = isActive;
    
                // Show the modal
                if (editImpactItemModal) {
                    const editModalInstance = new bootstrap.Modal(editImpactItemModal);
                    editModalInstance.show();
                }
            }
        });
    
        // Initialize - populate icons if modal exists
        if (document.getElementById('iconGrid')) {
            populateIconGrid(faIcons);
        }
    
        // Make impact items table sortable
        const impactItemsTable = document.getElementById('impact-items-table');
        if (impactItemsTable && typeof Sortable !== 'undefined') {
            new Sortable(impactItemsTable, {
                handle: '.handle',
                animation: 150,
                onEnd: function(evt) {
                    // Update items order via AJAX after sorting
                    const itemIds = Array.from(impactItemsTable.querySelectorAll('tr[data-id]'))
                        .map(row => row.dataset.id);
    
                    fetch('/admin/settings/about/impact-items/order', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            items: itemIds
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Optionally show success message
                        } else {
                            console.error('Error reordering items');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        }
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
@endsection
