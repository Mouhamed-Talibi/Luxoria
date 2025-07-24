@extends('layout.admin')

@section('title')
    Categories Management
@endsection

@section('content')
    <div class="container-fluid py-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold mb-0" style="color: var(--deep-black);">
                <i class="fa-solid fa-tags me-2"></i>Categories Management
            </h1>
            <a href="{{ route('admin.add_category') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-2"></i>Add New Category
            </a>
        </div>

        <!-- Main Categories Table -->
        <div class="card shadow-sm mb-5">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 80px;">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Description</th>
                                <th scope="col">Products Count</th>
                                <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>
                                    @if($category->image)
                                        <img src="{{ Storage::url($category->image) }}" 
                                            alt="{{ $category->name }}"
                                            class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-light" 
                                            style="width: 60px; height: 60px;">
                                            <i class="fa-solid fa-tag text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $category->name }}</div>
                                    <div class="small text-muted">Slug: {{ $category->slug }}</div>
                                </td>
                                <td>
                                    <div class="text-muted">{{ Str::limit($category->description, 60) }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-primary">{{ $category->products->count() ?? 0 }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="{{ route('admin.edit_category', $category->id) }}" 
                                            class="btn btn-sm btn-outline-primary"
                                            title="Edit" data-bs-toggle="tooltip">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal{{ $category->id }}"
                                            title="Delete" data-bs-toggle="tooltip">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete <strong>{{ $category->name }}</strong>?</p>
                                            @if(($category->products_count ?? 0) > 0)
                                            <div class="alert alert-warning mt-3">
                                                <i class="fa-solid fa-exclamation-triangle me-2"></i>
                                                This category contains {{ $category->products_count }} products. Deleting it will uncategorize these products.
                                            </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.destroy_category', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="fa-solid fa-tags fa-3x text-muted mb-3"></i>
                                        <h5 class="fw-semibold">No Categories Found</h5>
                                        <p class="text-muted">Start by adding your first category</p>
                                        <a href="{{ route('admin.add_category') }}" class="btn btn-primary mt-2">
                                            <i class="fa-solid fa-plus me-2"></i>Add Category
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Pagination -->
            @if($categories->hasPages())
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            </div>
            @endif
        </div>

        <!-- Trashed Categories Section -->
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">
                    <i class="fa-solid fa-trash-can me-2"></i>Trashed Categories
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Deleted At</th>
                                <th scope="col">Products Affected</th>
                                <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trashedCategories as $category)
                            <tr>
                                <td>
                                    <div class="fw-semibold">{{ $category->name }}</div>
                                    <div class="small text-muted">{{ Str::limit($category->description, 40) }}</div>
                                </td>
                                <td>
                                    {{ $category->deleted_at->format('M d, Y h:i A') }}
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $category->products_count ?? 0 }}</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.restore_category', $category->id)}}" 
                                        class="btn btn-sm btn-outline-success me-2"
                                        title="Restore" data-bs-toggle="tooltip">
                                        <i class="fa-solid fa-trash-can-arrow-up me-1"></i>Restore
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="fa-solid fa-trash-can fa-3x text-muted mb-3"></i>
                                        <h5 class="fw-semibold">No Trashed Categories</h5>
                                        <p class="text-muted">Deleted categories will appear here</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Enable Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endsection