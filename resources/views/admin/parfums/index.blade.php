@extends('layout.admin')

@section('title')
    Parfums mangement
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            @foreach ($parfums as $parfum)
                <div class="col-md-6 col-lg-4">
                    <div class="card" style="width: 18rem;">
                        @if($parfum->images && $parfum->images->isNotEmpty())
                            @if($parfum->images->count() > 2 && $parfum->images->get(2)->path)
                                <img src="{{ Storage::url($parfum->images->get(2)->path) }}" class="card-img-top" alt="{{ $parfum->name }}">
                            @else
                                <img src="{{ Storage::url($parfum->images->first()->path) }}" class="card-img-top" alt="{{ $parfum->name }}">
                            @endif
                        @else
                            <!-- Fallback image when no images exist -->
                            <img src="/path/to/default-image.jpg" class="card-img-top" alt="No image available">
                        @endif
                        <div class="card-body text-center">
                            <a href="{{ route('admin.edit_parfum', $parfum->id)}}" class="btn btn-outline-primary">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $parfum->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal-{{ $parfum->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="text-center bg-light p-4 rounded-2">
                                            <i class="fa-solid fa-trash fs-2 text-danger mb-3"></i>
                                            <h4>Cofirm Deletion</h4>
                                            <hr class="w-25 mx-auto">
                                            <p class="mt-3">
                                                Are you sure you want to delete <span class="fw-bold">{{ $parfum->name }}</span>
                                                <small class="text-danger d-inline-block">This action connot be undone</small>
                                            </p>
                                            <div class="links d-flex justify-content-center gap-2 mt-3">
                                                <button type="button" class="btn text-success border" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('admin.destroy_product', $parfum->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
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
        </div>
    </div>
@endsection