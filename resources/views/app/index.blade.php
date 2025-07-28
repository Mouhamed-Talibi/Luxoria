@extends('layout.app')

@section('title')
    الصفحة الرئيسية
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center g-3">
            <div class="col-md-6 col-lg-5">
                <div class="hero-text text-end">
                    <h6 class="text-primary mb-3 fw-bold" style="letter-spacing: 1px;">أحدث صيحات التسوق</h6>
                    <h1 class="display-4 fw-bold mb-4" style="line-height: 1.3; color: #2c3e50;">
                        اكتشف عالمًا من الأناقة والابتكار
                    </h1>
                    <p class="lead text-muted mb-4" style="line-height: 1.8">
                        تسوق أحدث الموديلات والعطور والاكسسوارات والإلكترونيات بأسعار تنافسية. جودة عالية، شحن سريع، وضمان استرداد الأموال.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-dark px-4 py-3 rounded-1 fw-bold">
                            ابدأ التسوق الآن <i class="fas fa-arrow-left ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Hero Image Column -->
            <div class="col-md-6 col-lg-5">
                <div class="hero-image-container p-3">
                    <div class="hero-image-wrapper">
                        <img src="{{ asset('assets/shoping.jpg')}}" alt="متجر لوكسوريا" class="hero-img">
                    </div>
                </div>
            </div>
        </div>
    </div>  
    {{--  services section --}}
    <div class="services mt-5">
        <div class="container">
            <div class="row justify-content-center align-items-center g-3">
                <div class="col-md-6 col-lg-4">
                    <div class="service p-3">
                        <i class="fas fa-truck fs-3 text-info"></i>
                        <h5 class="service-title d-inline-block ms-2">شحن سريع</h5>
                        <p class="service-description mt-2 ms-3">استمتع بشحن سريع وآمن لجميع طلباتك.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service p-3">
                        <i class="fas fa-bolt fs-3 text-info"></i>
                        <h5 class="service-title d-inline-block ms-2">توصيل سريع</h5>
                        <p class="service-description mt-2 ms-3">احصل على طلباتك بأسرع وقت ممكن مع خدمة التوصيل السريع لدينا.</p> <!-- "Get your orders as quickly as possible with our fast delivery service" -->
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service p-3">
                        <i class="fa-solid fa-dollar-sign fs-3 text-info"></i>
                        <h5 class="service-title d-inline-block ms-2">الدفع عند الاستلام</h5>
                        <p class="service-description mt-2 ms-3">ادفع عند استلام طلبك بكل سهولة وأمان.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection