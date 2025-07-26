@extends('layout.app')

@section('title')
    الصفحة الرئيسية
@endsection

@section('content')
    <div class="contaier">
        <div class="row justify-content-center align-items-center g-3">
            <div class="col-md-6 col-lg-5">
                <div class="hero-text text-end">
                    <h6 class="text-primary mb-3 fw-bold" style="letter-spacing: 1px;">أحدث صيحات التسوق</h6> <!-- "Latest Shopping Trends" -->
                    <h1 class="display-4 fw-bold mb-4" style="line-height: 1.3; color: #2c3e50;">
                        اكتشف عالمًا من الأناقة والابتكار
                    </h1> <!-- "Discover a world of elegance and innovation" -->
                    <p class="lead text-muted mb-4" style="line-height: 1.8">
                        تسوق أحدث الموديلات والعطور والاكسسوارات والإلكترونيات بأسعار تنافسية. جودة عالية، شحن سريع، وضمان استرداد الأموال.
                    </p> <!-- "Shop the latest fashion, perfumes, accessories and electronics at competitive prices..." -->
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-dark px-4 py-3 rounded-1 fw-bold">
                            ابدأ التسوق الآن <i class="fas fa-arrow-left ms-2"></i> <!-- "Start Shopping Now" -->
                        </a>
                    </div>
                </div>
            </div>
            {{-- hero-image --}}
            <div class="col-md-6 col-lg-5">
                <div class="hero-image">
                    <img src="{{ asset('assets/shoping.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
    </div>    
@endsection