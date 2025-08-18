@extends('layout.admin')

    @section('title')
        Dashboard
    @endsection

    @section('content')
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="card border border-1 shadow-lg rounded-4 overflow-hidden bg-gradient-primary">
                        <div class="card-body p-4 position-relative">
                            <!-- Background decorative element -->
                            <div class="position-absolute end-0 top-1 opacity-10 me-3">
                                <i class="fa-solid fa-users fa-2x text-primary"></i>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-start">
                                <!-- Text content -->
                                <div class="text-start">
                                    <p class="text-dark-50 mb-1 fw-semibold small">TOTAL USERS</p>
                                    <h2 class="text-dark mb-0 fw-bold display-6">{{ $totalUsers ?? 0 }}</h2>
                                    <!-- Optional growth indicator -->
                                    <div class="d-flex align-items-center mt-2">
                                        @if ( $usersGrowth > 0 )
                                            <span class="badge bg-white text-success rounded-pill px-2 py-1">
                                                <i class="fas fa-arrow-up me-1 small"></i> {{ $usersGrowth }}%
                                            </span>
                                        @endif
                                        @if ( $usersGrowth <= 0 )
                                            <span class="badge bg-white text-danger rounded-pill px-2 py-1">
                                                <i class="fas fa-arrow-down me-1 small"></i> {{ abs($usersGrowth) }}%
                                            </span>
                                        @endif
                                        <span class="text-dark-50 small ms-2">Than Last Week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- orders total --}}
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="card border border-1 shadow-lg rounded-4 overflow-hidden bg-gradient-primary">
                        <div class="card-body p-4 position-relative">
                            <!-- Background decorative element -->
                            <div class="position-absolute end-0 top-1 opacity-10 me-3">
                                <i class="fa-solid fa-cart-flatbed fa-2x text-primary"></i>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-start">
                                <!-- Text content -->
                                <div class="text-start">
                                    <p class="text-dark-50 mb-1 fw-semibold small">TOTAL ORDERS</p>
                                    <h2 class="text-dark mb-0 fw-bold display-6">{{ $totalOrders ?? 0 }}</h2>
                                    <!-- Optional growth indicator -->
                                    <div class="d-flex align-items-center mt-2">
                                        @if($ordersGrowth > 0)
                                            <span class="badge bg-white text-success rounded-pill px-2 py-1">
                                                <i class="fas fa-arrow-up me-1 small"></i> {{ $ordersGrowth }}%
                                            </span>
                                        @endif
                                        @if($ordersGrowth <= 0)
                                            <span class="badge bg-white text-danger rounded-pill px-2 py-1">
                                                <i class="fas fa-arrow-down me-1 small"></i> {{ $ordersGrowth }}%
                                            </span>
                                        @endif
                                        <span class="text-dark-50 small ms-2">Than Last Week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- products total --}}
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="card border border-1 shadow-lg rounded-4 overflow-hidden bg-gradient-primary">
                        <div class="card-body p-4 position-relative">
                            <!-- Background decorative element -->
                            <div class="position-absolute end-0 top-1 opacity-10 me-3">
                                <i class="fas fa-box-open fa-2x text-primary"></i>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-start">
                                <!-- Text content -->
                                <div class="text-start">
                                    <p class="text-dark-50 mb-1 fw-semibold small">TOTAL PRODUCTS</p>
                                    <h2 class="text-dark mb-0 fw-bold display-6">{{ $totalProducts ?? 0 }}</h2>
                                    <!-- Optional growth indicator -->
                                    <div class="d-flex align-items-center mt-2">
                                        @if($productsGrowth > 0)
                                            <span class="badge bg-white text-success rounded-pill px-2 py-1">
                                                <i class="fas fa-arrow-up me-1 small"></i> {{ $productsGrowth }}%
                                            </span>
                                        @endif
                                        @if($productsGrowth <= 0)
                                            <span class="badge bg-white text-danger rounded-pill px-2 py-1">
                                                <i class="fas fa-arrow-down me-1 small"></i> {{ $productsGrowth }}%
                                            </span>
                                        @endif
                                        <span class="text-dark-50 small ms-2">Than Last Week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection