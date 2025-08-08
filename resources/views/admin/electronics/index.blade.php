@extends('layout.admin')

@section('title')
    Eletronics mangement
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            @if ($electronics->isEmpty())
                <div class="text-center mt-5">
                    <div class="p-5 border rounded shadow-sm" style="max-width: 600px; margin: auto;">
                        <h1 class="mb-4" style="font-size: 2rem; color: #555;">
                            No electronics products found
                        </h1>
                        <a href="{{ route('admin.electronics.create') }}" 
                        class="btn btn-outline-primary px-4 py-2" 
                        style="font-weight: 500; font-size: 1.1rem;">
                            + Create New Product
                        </a>
                    </div>
                </div>
            @endif

            @foreach ($electronics as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="card" style="width: 18rem;">
                        @if($product->images && $product->images->isNotEmpty())
                            @if($product->images->count() > 2 && $product->images->get(2)->path)
                                <img src="{{ Storage::url($product->images->get(2)->path) }}" class="card-img-top" alt="{{ $product->name }}">
                            @else
                                <img src="{{ Storage::url($product->images->first()->path) }}" class="card-img-top" alt="{{ $product->name }}">
                            @endif
                        @else
                            <!-- Fallback image when no images exist -->
                            <img src="/path/to/default-image.jpg" class="card-img-top" alt="No image available">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3">{{ $product->name }}</h5>
                            <a href="{{ route('admin.electronics.edit', $product)}}" class="btn btn-outline-primary">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $product->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal-{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="text-center bg-light p-4 rounded-2">
                                            <i class="fa-solid fa-trash fs-2 text-danger mb-3"></i>
                                            <h4>Cofirm Deletion</h4>
                                            <hr class="w-25 mx-auto">
                                            <p class="mt-3">
                                                Are you sure you want to delete <span class="fw-bold">{{ $product->name }}</span>
                                                <small class="text-danger d-inline-block">This action connot be undone</small>
                                            </p>
                                            <div class="links d-flex justify-content-center gap-2 mt-3">
                                                <button type="button" class="btn text-success border" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('admin.destroy_product', $product->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash me-1"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Pagination -->
            @if($electronics->hasPages())
                <div class="text-center mt-3">
                    {{ $electronics->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection