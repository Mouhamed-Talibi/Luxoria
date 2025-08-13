@extends('layout.admin')

    @section('title')
        Add Product
    @endsection

    @section('content')
        <div class="container">
            <div class="row justify-content-center align-items-center g-3">
                <div class="col-md-6 col-lg-3">
                    <div class="card p-3 border">
                        <i class="fas fa-spray-can-sparkles text-center fs-1 mb-2"></i>
                        <a href="{{ route('admin.parfums.manage') }}" class="block group text-primary btn" style="text-decoration-line: underline">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="fs-4">
                                        Parfums Management
                                    </p>
                                </div>
                            </div>
                        </a>
                        <p class="text-secondary text-center">Manage your parfums products easily</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card p-3 border">
                        <i class="fa-solid fa-atom text-center fs-1 mb-2"></i>
                        <a href="{{ route('admin.electronics.manage') }}" class="block group text-primary btn" style="text-decoration-line: underline">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="fs-4">
                                        Electronics Management
                                    </p>
                                </div>
                            </div>
                        </a>
                        <p class="text-secondary text-center">Manage your books products easily</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card p-3 border">
                        <i class="fa-solid fa-shirt text-center fs-1 mb-2"></i>
                        <a href="{{ route('admin.clothes.manage') }}" class="block group text-primary btn" style="text-decoration-line: underline">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="fs-4">
                                        Clothes Management
                                    </p>
                                </div>
                            </div>
                        </a>
                        <p class="text-secondary text-center">Manage your Clothes products easily</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection