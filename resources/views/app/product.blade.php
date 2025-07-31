@extends('layout.app')

@section('title')
    تفاصيل المنتج
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center g-3">
            <div class="col-md-6 col-lg-6">
                <div class="product-image-container p-3 bg-dark bg-opacity-25 text-center">
                    <img src="{{ Storage::url($product->image ) }}" alt="{{ $product->name }}" class="img-fluid" loading="lazy">
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="product-details">
                    <div class="category">
                        <p class="text-secondary">
                            {{ $product->category->name }} / {{ $product->name }}
                        </p>
                    </div>
                    <div class="name">
                        <h2>
                            {{ $product->name }}
                        </h2>
                    </div>
                    <div class="price">
                        <p class="text-primary">
                            {{ number_format($product->price, 2) }} درهم
                        </p>
                    </div>
                    <div class="description">
                        <p class="text-secondary">
                            {{ $product->description }}
                        </p>
                    </div>
                    <div class="link">
                        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="ms-2">إضافة إلى السلة</span>
                        </button>
                    </div>
                    {{-- add to cart modal --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content py-5 pb-5">
                                <h3 class="text-center">اضافة منتج للسلة</h3>
                                <hr class="w-25 mx-auto text-primary">
                                {{-- form modal --}}
                                <form action="" class="" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" name="" id="">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection