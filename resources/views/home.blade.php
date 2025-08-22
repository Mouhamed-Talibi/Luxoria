@extends('layout.app')

@section('title')
    الرئيسية
@endsection

@push('styles')
<style>
    /* Animation classes */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    
    .animate-on-scroll.animated {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Hero image animation */
    .hero-image-wrapper {
        transform: perspective(1000px) rotateY(-5deg);
        transition: transform 1s ease;
    }
    
    .hero-image-wrapper.animated {
        transform: perspective(1000px) rotateY(0deg);
    }
    
    /* Service items animation */
    .service {
        transition: transform 0.5s ease;
    }
    
    .service.animated {
        transform: translateY(-10px);
    }
    
    /* Category cards animation */
    .category {
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }
    
    .category.animated {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }
</style>
@endpush

@section('content')
    <div class="container">
        <!-- Hero Section -->
        <div class="hero-section py-2">
            <div class="row justify-content-center align-items-center g-3">
                <div class="col-md-6 col-lg-5 order-md-1">
                    <div class="hero-text text-end animate-on-scroll">
                        <h6 class="text-primary mb-3 fw-bold" style="letter-spacing: 1px;">أحدث صيحات التسوق</h6>
                        <h1 class="display-4 fw-bold mb-4" style="line-height: 1.3; color: #2c3e50;">
                            <span class="typing-animation">
                                اكتشف عالمًا من الأناقة والابتكار
                            </span>
                        </h1>
                        <p class="lead text-muted mb-4" style="line-height: 1.8">
                            تسوق أحدث الموديلات والعطور والاكسسوارات والإلكترونيات بأسعار تنافسية. جودة عالية، شحن سريع، وضمان استرداد الأموال.
                        </p>
                        <div class="d-flex gap-3 justify-content-start">
                            <a href="{{ route('auth.login')}}" class="btn btn-dark px-4 py-3 rounded-1 fw-bold">
                                ابدأ التسوق الآن <i class="fas fa-arrow-left ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Hero Image Column -->
                <div class="col-md-6 col-lg-5 order-md-0">
                    <div class="hero-image-container p-3">
                        <div class="hero-image-wrapper animate-on-scroll">
                            <img src="{{ asset('assets/shoping-1.jpg')}}" alt="متجر لوكسوريا" class="hero-img img-fluid" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Services Section -->
        <div class="services mt-5 bg-dark">
            <div class="container">
                <div class="row justify-content-center align-items-center g-3">
                    <div class="col-md-6 col-lg-4">
                        <div class="service p-3 animate-on-scroll">
                            <i class="fas fa-truck fs-3 text-info" aria-hidden="true"></i>
                            <h5 class="service-title d-inline-block ms-2">شحن سريع</h5>
                            <p class="service-description mt-2">استمتع بشحن سريع وآمن لجميع طلباتك.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="service p-3 animate-on-scroll">
                            <i class="fas fa-bolt fs-3 text-info" aria-hidden="true"></i>
                            <h5 class="service-title d-inline-block ms-2">توصيل سريع</h5>
                            <p class="service-description mt-2">احصل على طلباتك بأسرع وقت ممكن مع خدمة التوصيل السريع لدينا.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="service p-3 animate-on-scroll">
                            <i class="fa-solid fa-dollar-sign fs-3 text-info" aria-hidden="true"></i>
                            <h5 class="service-title d-inline-block ms-2">الدفع عند الاستلام</h5>
                            <p class="service-description mt-2">ادفع عند استلام طلبك بكل سهولة وأمان.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        {{-- categories --}}
        <div class="categories py-5 pb-5">
            <div class="main-title text-center animate-on-scroll">
                <i class="fa-solid fa-layer-group fs-2 text-info"></i>
                <h1 class="display-4 fw-bold mt-2">أصناف المنتجات</h1>
                <p class="text-secondary">اكتشف منتجاتنا المتنوعة من خلال التصنيفات</p>  
            </div>
            <div>
                <div class="row justify-content-center align-items-center g-3 mt-5">
                    {{-- display categories --}}
                    @foreach ($categories as $category)
                        <div class="col-6 col-md-6 col-lg-4 mb-4">
                            <div class="category card h-100 border-0 shadow-sm overflow-hidden animate-on-scroll">
                                <div class="category-image overflow-hidden">
                                    <img 
                                        src="{{ Storage::url($category->image)}}" 
                                        alt="{{ $category->name }}"
                                        class="img-fluid w-100 h-auto object-fit-cover"
                                        loading="lazy"
                                    >
                                </div>
                                <div class="category-text text-center p-4">
                                    <h3 class="text-dark mb-0 fs-5 fw-semibold">{{ $category->name }}</h3>
                                    <a href="{{ route('auth.login')}}" class="stretched-link" aria-label="View {{ $category->name }}"></a>
                                </div>
                                <div class="w-75 mx-auto">
                                    <p class="text-secondary ">{{ Str::limit($category->description, 80) }}</p>
                                </div>
                                <div class="text-center text-primary mb-3">
                                    <small>{{ $category->products->count() }} منتوج</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>    
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Bootstrap components
        const scrollElements = document.querySelectorAll('.animate-on-scroll');
        
        // Intersection Observer for scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    // Stop observing after animation
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        // Observe all elements with animate-on-scroll class
        scrollElements.forEach(element => {
            observer.observe(element);
        });
        
        // Add staggered animation delay to category cards
        const categoryCards = document.querySelectorAll('.category');
        categoryCards.forEach((card, index) => {
            card.style.transitionDelay = `${index * 0.1}s`;
        });
        
        // Add staggered animation delay to service items
        const serviceItems = document.querySelectorAll('.service');
        serviceItems.forEach((item, index) => {
            item.style.transitionDelay = `${index * 0.2}s`;
        });
    });
</script>
@endpush