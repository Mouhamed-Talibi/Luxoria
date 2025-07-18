@extends('layout.admin')

    @section('title')
        Categories
    @endsection

    @section('content')
        @section('content')
    <div class="container py-4">
        <!-- Header with Add Button -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h3 class="display-8 fw-bold" style="color: var(--deep-black);">
                <i class="fa-solid fa-tags me-2"></i>Product Categories
            </h3>
            <a href="{{ route('admin.add_category') }}" class="btn" style="background-color: var(--blue); color: white;">
                <i class="fa-solid fa-plus me-2"></i>Add New
            </a>
        </div>

        <!-- Categories Grid -->
        <div class="row g-4">
            @forelse ($categories as $category)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <!-- Category Image -->
                        <div class="card-img-top overflow-hidden" style="height: 200px; background-color: var(--light-blue);">
                            @if($category->image)
                                <img src="{{ Storage::url($category->image) }}" 
                                    alt="{{ $category->name }}"
                                    class="img-fluid w-100 h-100 object-fit-cover">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-image fa-3x" style="color: var(--gray);"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Category Body -->
                        <div class="card-body">
                            <h3 class="card-title fw-bold mb-3" style="color: var(--deep-black);">
                                {{ $category->name }}
                            </h3>
                            <p class="card-text text-muted mb-4">
                                {{ Str::limit($category->description, 120) }}
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-center gap-2">
                            <a href="" 
                            class="btn btn-sm" 
                            style="background-color: var(--soft-blue); color: white;">
                                <i class="fa-solid fa-pen-to-square me-1"></i>
                            </a>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-trash me-1"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5" style="background-color: var(--light-blue); border-radius: 10px;">
                        <i class="fa-solid fa-tags fa-3x mb-3" style="color: var(--gray);"></i>
                        <h4 class="fw-bold" style="color: var(--deep-black);">No Categories Found</h4>
                        <p class="text-muted">Start by adding your first product category</p>
                        <a href="{{ route('admin.add_category') }}" class="btn mt-3" style="background-color: var(--blue); color: white;">
                            <i class="fa-solid fa-plus me-2"></i>Create Category
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($categories->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
    @endsection