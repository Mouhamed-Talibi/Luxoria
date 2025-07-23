@extends('layout.admin')

@section('title')
    products
@endsection

@section('content')
    <div class="container py-4">
        <!-- Header with Add Button -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h3 class="display-8 fw-bold" style="color: var(--deep-black);">
                <i class="fa-solid fa-tags me-2"></i>Products
            </h3>
            <a href="{{ route('admin.add_product') }}" class="btn" style="background-color: var(--blue); color: white;">
                <i class="fa-solid fa-plus me-2"></i>Add New
            </a>
        </div>

        <!-- products Grid -->
        <div class="row g-4">
            @forelse ($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <!-- product Image -->
                        <div class="card-img-top overflow-hidden" style="height: 200px; background-color: var(--light-blue);">
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" 
                                    alt="{{ $product->name }}"
                                    class="img-fluid w-100 h-100" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-image fa-3x" style="color: var(--gray);"></i>
                                </div>
                            @endif
                        </div>

                        <!-- product Body -->
                        <div class="card-body">
                            <h3 class="card-title fw-bold mb-3" style="color: var(--deep-black);">
                                {{ $product->name }}
                            </h3>
                            <p class="card-text text-muted mb-4">
                                {{ Str::limit($product->description, 120) }}
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-center gap-2">
                            <a href="{{ route('admin.edit_category', $product->id) }}" 
                                class="btn btn-sm" 
                                style="background-color: var(--soft-blue); color: white;" 
                                title="Edit product">
                                <i class="fa-solid fa-pen-to-square me-1"></i>
                            </a>
                            
                            <button 
                                type="button" 
                                class="btn btn-sm btn-outline-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal{{ $product->id }}"
                                title="Delete product">
                                <i class="fa-solid fa-trash me-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteLabel{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="text-center p-3">
                                <span class="mb-3">
                                    <i class="fa-solid fa-trash fa-2x text-danger mb-3"></i>
                                </span>
                                <h2 id="deleteLabel{{ $product->id }}">Confirm Deleting</h2>
                                <hr class="w-25 mx-auto">
                                <p class="mt-4 w-75 mx-auto">
                                    Are you sure you want to delete "{{ $product->name }}"? This action cannot be undone.
                                </p>
                            </div>
                            <div class="links d-flex gap-2 justify-content-center mb-3">
                                <button type="button" class="btn btn-sm border border-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('admin.destroy_category', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm text-light bg-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5" style="background-color: var(--light-blue); border-radius: 10px;">
                        <i class="fa-solid fa-tags fa-3x mb-3" style="color: var(--gray);"></i>
                        <h4 class="fw-bold" style="color: var(--deep-black);">No products Found</h4>
                        <p class="text-muted">Start by adding your first product product</p>
                        <a href="{{ route('admin.add_product') }}" class="btn mt-3" style="background-color: var(--blue); color: white;">
                            <i class="fa-solid fa-plus me-2"></i>Create product
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- products trash --}}
        <hr class="mt-5">

        <div class="d-flex justify-content-between align-items-center mb-5">
            <h3 class="display-8 fw-bold" style="color: var(--deep-black);">
                <i class="fa-solid fa-tags me-2"></i>products Trash 
            </h3>
        </div>

        <!-- products Grid -->
        <div class="row g-4">
            @forelse ($trashedProducts as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <!-- product Image -->
                        <div class="card-img-top overflow-hidden" style="height: 200px; background-color: var(--light-blue);">
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" 
                                    alt="{{ $product->name }}"
                                    class="img-fluid w-100 h-100" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-image fa-3x" style="color: var(--gray);"></i>
                                </div>
                            @endif
                        </div>

                        <!-- product Body -->
                        <div class="card-body">
                            <h3 class="card-title fw-bold mb-3" style="color: var(--deep-black);">
                                {{ $product->name }}
                            </h3>
                            <p class="card-text text-muted mb-4">
                                {{ Str::limit($product->description, 120) }}
                            </p>
                        </div>

                        {{-- product actins --}}
                        <div class="text-center mb-3">
                            <a href="{{ route('admin.restore_product', $product->id)}}" class="btn btn-outline-success">
                                <i class="fa-solid fa-trash-can-arrow-up"></i>
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12">
                    <div class="text-center py-5" style="background-color: var(--light-blue); border-radius: 10px;">
                        <i class="fa-solid fa-tags fa-3x mb-3" style="color: var(--gray);"></i>
                        <h4 class="fw-bold" style="color: var(--deep-black);">No Trashed products Found</h4>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@endsection
