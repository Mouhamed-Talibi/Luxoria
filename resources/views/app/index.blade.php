@extends('layout.app')

@section('title')
    الصفحة الرئيسية
@endsection

@section('content')
    <div class="container">
        <!-- Hero Section -->
        <div class="hero-section py-2" data-aos="fade-up">
            <div class="row justify-content-center align-items-center g-3">
                <div class="col-md-6 col-lg-5 order-md-1" data-aos="fade-right" data-aos-delay="100">
                    <div class="hero-text text-end">
                        <h6 class="text-primary mb-3 fw-bold" style="letter-spacing: 1px;" data-aos="fade-left" data-aos-delay="200">أحدث صيحات التسوق</h6>
                        <h1 class="display-4 fw-bold mb-4" style="line-height: 1.3; color: #2c3e50;" data-aos="zoom-in" data-aos-delay="300">
                            <span class="typing-animation">
                                اكتشف عالمًا من الأناقة والابتكار
                            </span>
                        </h1>
                        <p class="lead text-muted mb-4" style="line-height: 1.8" data-aos="fade-up" data-aos-delay="400">
                            تسوق أحدث الموديلات والعطور والاكسسوارات والإلكترونيات بأسعار تنافسية. جودة عالية، شحن سريع، وضمان استرداد الأموال.
                        </p>
                        <div class="d-flex gap-3 justify-content-start" data-aos="fade-up" data-aos-delay="500">
                            <a href="#categories" class="btn btn-dark px-4 py-3 rounded-1 fw-bold">
                                ابدأ التسوق الآن <i class="fas fa-arrow-left ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Hero Image Column -->
                <div class="col-md-6 col-lg-5 order-md-0" data-aos="zoom-in-left" data-aos-delay="200">
                    <div class="hero-image-container p-3">
                        <div class="hero-image-wrapper">
                            <img src="{{ asset('assets/shoping.jpg')}}" alt="متجر لوكسوريا" class="hero-img img-fluid" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="services mt-5">
        <div class="container">
            <div class="row justify-content-center align-items-center g-3">
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="100">
                    <div class="service p-3">
                        <i class="fas fa-truck fs-3 text-info" aria-hidden="true"></i>
                        <h5 class="service-title d-inline-block ms-2">شحن سريع</h5>
                        <p class="service-description mt-2">استمتع بشحن سريع وآمن لجميع طلباتك.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="flip-up" data-aos-delay="200">
                    <div class="service p-3">
                        <i class="fas fa-bolt fs-3 text-info" aria-hidden="true"></i>
                        <h5 class="service-title d-inline-block ms-2">توصيل سريع</h5>
                        <p class="service-description mt-2">احصل على طلباتك بأسرع وقت ممكن مع خدمة التوصيل السريع لدينا.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="flip-right" data-aos-delay="300">
                    <div class="service p-3">
                        <i class="fa-solid fa-dollar-sign fs-3 text-info" aria-hidden="true"></i>
                        <h5 class="service-title d-inline-block ms-2">الدفع عند الاستلام</h5>
                        <p class="service-description mt-2">ادفع عند استلام طلبك بكل سهولة وأمان.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Selling Products -->
    <div class="best-selling-pro py-5" data-aos="fade-up">
        <div class="container">
            <div class="main-title mt-5 text-center" data-aos="zoom-in">
                <h2 class="display-5 fw-bold">المنتجات الأكثر <span style="color: #2c3e50;">مبيعاً</span></h2>
                <hr class="w-25 mx-auto text-info">
            </div>
            <div class="products mt-5">
                <div class="row justify-content-center g-3 g-md-4">
                    @foreach($bestSellingProducts as $product)
                        <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="product h-100">
                                <div class="product-image">
                                    <img src="{{ Storage::url($product->images->get(2)->path )}}" alt="{{ $product->name}}" class="img-fluid" loading="lazy">
                                </div>
                                <div class="product-details text-center p-3">
                                    <strong class="text-secondary d-block">{{ $product->category->name}}</strong>
                                    <h3 class="mt-2 h5">{{ $product->name }}</h3>
                                    <div class="rating text-warning my-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <p class="price mt-2">{{ number_format($product->price, 2) }} درهم</p>
                                </div>
                                <a href="{{ route('app.show_product', $product->id) }}" class="stretched-link" aria-label="عرض تفاصيل المنتج"></a>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 text-start mt-4" data-aos="fade-left">
                        <a href="#" class="btn btn-dark px-2 py-2 rounded-1 d-inline-flex align-items-center">
                            <span class="ms-2">عرض الكل</span>
                            <i class="fas fa-arrow-left ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- categories --}}
    <div class="categories py-5 pb-5" id="categories" data-aos="fade-up">
        <div class="main-title text-center" data-aos="zoom-in">
            <i class="fa-solid fa-layer-group fs-2 text-info"></i>
            <h1 class="display-4 fw-bold mt-2">أصناف المنتجات</h1>
            <p class="text-secondary">اكتشف منتجاتنا المتنوعة من خلال التصنيفات</p>  
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center g-3 mt-5">
                {{-- display categories --}}
                @foreach ($categories as $category)
                    <div class="col-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}">
                        <div class="category card h-100 border-0 shadow-sm overflow-hidden">
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
                                <a href="{{ route('app.show_category_products', $category)}}" class="stretched-link" aria-label="View {{ $category->name }}"></a>
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
@endsection
