@extends('layout.app')

@section('title')
    الرئيسية
@endsection

@push('styles')
<style>
    :root {
        --background-color: #ffffff;
        --default-color: #314862;
        --heading-color: #13447f;
        --accent-color: #065cc2;
        --surface-color: #ffffff;
        --contrast-color: #ffffff;
        --primary-color: #4361ee;
        --secondary-color: #f8f9fa;
        --accent-color: #3a0ca3;
        --text-color: #2b2d42;
        --light-text: #6c757d;
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        --hover-shadow: 0 15px 35px rgba(67, 97, 238, 0.15);
        --transition: all 0.3s ease;
    }

    .animate-on-scroll {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .animate-on-scroll.animated { opacity: 1; transform: translateY(0); }

    .hero-image-wrapper {
        transform: perspective(1000px) rotateY(-5deg);
        transition: transform 1s ease;
    }
    .hero-image-wrapper.animated { transform: perspective(1000px) rotateY(0deg); }

    .service { transition: transform 0.5s ease; }
    .service.animated { transform: translateY(-10px); }

    .category {
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }
    .category.animated {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }

    /* courses */
    .course-card {
        background: white;
        border: none;
        border-radius: 16px;
        overflow: hidden;
        transition: var(--transition);
        box-shadow: var(--card-shadow);
        height: 100%;
    }
    .course-card:hover { transform: translateY(-5px); box-shadow: var(--hover-shadow); }
    .course-image { position: relative; overflow: hidden; }
    .course-image img {
        background-color: #4a6886;
        width: 100%; height: 220px;
        object-fit: cover;
        transition: var(--transition);
    }
    .course-card:hover .course-image img { transform: scale(1.05); }

    .course-badge {
        position: absolute; top: 15px; right: 15px;
        background: var(--default-color); color: white;
        padding: 5px 12px; border-radius: 50px;
        font-size: 0.8rem; font-weight: 500;
    }
    .course-content { padding: 1.5rem; }
    .course-title {
        font-weight: 700; font-size: 1.4rem;
        margin-bottom: 0.8rem; color: var(--text-color);
    }
    .course-description { color: var(--light-text); margin-bottom: 1.5rem; line-height: 1.6; }
    .course-meta { display: flex; justify-content: center; margin-bottom: 1.5rem; font-size: 0.9rem; }
    .meta-item { display: flex; align-items: center; color: var(--light-text); }
    .meta-item i { margin-right: 5px; color: var(--primary-color); }

    .btn-enroll {
        background: var(--primary-color); color: white;
        padding: 5px 5px; border-radius: 50px;
        font-weight: 500; transition: var(--transition);
        display: inline-flex; align-items: center; justify-content: center;
        text-decoration: none; border: 2px solid var(--primary-color);
    }
    .btn-enroll:hover {
        background: transparent; color: var(--primary-color);
        transform: translateY(-2px);
    }
    .btn-enroll i { margin-left: 8px; transition: var(--transition); }
    .btn-enroll:hover i { transform: translateX(4px); }

    .rating { color: #ffc107; margin-bottom: 0.8rem; }
    .price { font-weight: 700; font-size: 1.2rem; color: var(--accent-color); margin-bottom: 1rem; }

    .randomProducts { background-color: #1a3046; }

    /* Testimonials Section */
    .testimonials {
        padding: 5rem 0;
        background-color: var(--secondary-color);
    }
    
    .testimonial-img {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        height: 100%;
    }
    
    .testimonial-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .testimonial-form {
        background: white;
        padding: 2.5rem;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        height: 100%;
    }
    
    .testimonial-form .form-control {
        padding: 0.75rem 1rem;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        transition: var(--transition);
    }
    
    .testimonial-form .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
    }
    
    .testimonial-form textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }
    
    .rating-input {
        display: flex;
        justify-content: center;
        margin-bottom: 1.5rem;
        direction: ltr;
    }
    
    .rating-input input {
        display: none;
    }
    
    .rating-input label {
        cursor: pointer;
        font-size: 2rem;
        color: #ddd;
        transition: var(--transition);
        margin: 0 0.1rem;
    }
    
    .rating-input input:checked ~ label,
    .rating-input label:hover,
    .rating-input label:hover ~ label {
        color: #ffc107;
    }
    
    .rating-input input:checked + label {
        color: #ffc107;
    }
    
    .btn-submit {
        background: var(--primary-color);
        color: white;
        padding: 0.50rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        transition: var(--transition);
        border: 2px solid var(--primary-color);
        width: 100%;
        margin-top: 1rem;
    }
    
    .btn-submit:hover {
        background: transparent;
        color: var(--primary-color);
        transform: translateY(-2px);
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .testimonial-img {
            height: 400px;
            margin-bottom: 2rem;
        }
    }
    
    @media (max-width: 576px) {
        .testimonial-form {
            padding: 1.5rem;
        }
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
                            <span class="typing-animation">اكتشف عالمًا من الأناقة والابتكار</span>
                        </h1>
                        <p class="lead text-muted mb-4" style="line-height: 1.8">
                            تسوق أحدث الموديلات والعطور والاكسسوارات والإلكترونيات بأسعار تنافسية. جودة عالية، شحن سريع، وضمان استرداد الأموال.
                        </p>
                        <div class="d-flex gap-3 justify-content-start">
                            <a href="#" class="btn btn-dark px-4 py-3 rounded-1 fw-bold" data-bs-toggle="modal" data-bs-target="#loginRequiredModal">
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
                        <i class="fas fa-truck fs-3 text-info"></i>
                        <h5 class="service-title d-inline-block ms-2">شحن سريع</h5>
                        <p class="service-description mt-2">استمتع بشحن سريع وآمن لجميع طلباتك.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service p-3 animate-on-scroll">
                        <i class="fas fa-bolt fs-3 text-info"></i>
                        <h5 class="service-title d-inline-block ms-2">توصيل سريع</h5>
                        <p class="service-description mt-2">احصل على طلباتك بأسرع وقت ممكن مع خدمة التوصيل السريع لدينا.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service p-3 animate-on-scroll">
                        <i class="fa-solid fa-dollar-sign fs-3 text-info"></i>
                        <h5 class="service-title d-inline-block ms-2">الدفع عند الاستلام</h5>
                        <p class="service-description mt-2">ادفع عند استلام طلبك بكل سهولة وأمان.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="container">
        <div class="categories py-5 pb-5">
            <div class="main-title text-center animate-on-scroll">
                <i class="fa-solid fa-layer-group fs-2 text-info"></i>
                <h1 class="display-4 fw-bold mt-2">أصناف المنتجات</h1>
                <p class="text-secondary">اكتشف منتجاتنا المتنوعة من خلال التصنيفات</p>  
            </div>
            <div>
                <div class="row justify-content-center align-items-center g-3 mt-5">
                    @foreach ($categories as $category)
                        <div class="col-6 col-md-6 col-lg-4 mb-4">
                            <div class="category card h-100 border-0 shadow-sm overflow-hidden animate-on-scroll">
                                <div class="category-image overflow-hidden">
                                    <img src="{{ Storage::url($category->image)}}" alt="{{ $category->name }}" class="img-fluid w-100 h-auto object-fit-cover" loading="lazy">
                                </div>
                                <div class="category-text text-center p-4">
                                    <h3 class="text-dark mb-0 fs-5 fw-semibold">{{ $category->name }}</h3>
                                    <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#loginRequiredModal" aria-label="View {{ $category->name }}"></a>
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

    <!-- Random Products -->
    <div class="randomProducts text-light animate-on-scroll">
        <div class="container-fluid py-4 pb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center mt-3 mb-4 animate-on-scroll">
                <i class="fa fa-box-open fs-2 text-info"></i>
                <h1 class="display-4 fw-bold mt-2">بعض منتجاتنا</h1>
                <p class="text-secondary">اكتشف منتجاتنا المتنوعة</p> 
            </div>
            <div class="row g-4 justify-content-center mt-4 animate-on-scroll">
                @foreach ($randomProducts as $product)
                    <div class="col-12 col-lg-3 col-md-3 mb-4 text-center animate-on-scroll" data-aos="fade-up" data-aos-delay="100">
                        <div class="course-card">
                            <div class="course-image">
                                <img src="{{ Storage::url($product->images->first()->path)}}" alt="{{ $product->name}}" class="img-fluid">
                                <div class="course-badge">{{ $product->category->name }}</div>
                            </div>
                            <div class="course-content">
                                <h3 class="course-title text-dark-25">{{ $product->name }}</h3>
                                <div class="course-meta">
                                    <div class="meta-item">
                                        <i class="fa fa-dollar-sign"></i>
                                        <span>{{ $product->price }} درهم</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="#" class="btn-enroll" data-bs-toggle="modal" data-bs-target="#loginRequiredModal">
                                        اطلب الان <i class="fas fa-arrow-left me-3"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Course Item -->
                @endforeach
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials py-5 animate-on-scroll">
        <div class="container">
            <div class="row justify-content-center align-items-stretch">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="testimonial-img animate-on-scroll">
                        <img src="{{ asset('assets/satisfied-customer.jpg')}}" alt="تجربة العملاء" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="testimonial-form animate-on-scroll">
                        <div class="text-center mb-5">
                            <i class="fas fa-comments fs-2 text-info mb-3"></i>
                            <h2 class="fw-bold">شاركنا تجربتك</h2>
                            <p class="text-muted">رأيك يهمنا! شاركنا تجربتك مع منتجاتنا وخدماتنا</p>
                        </div>
                        
                        <form action="" method="POST" class="animate-on-scroll">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">الاسم الكامل</label>
                                    <input type="text" class="form-control" id="name" placeholder="أدخل اسمك الكامل" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">البريد الإلكتروني</label>
                                    <input type="email" class="form-control" id="email" placeholder="أدخل بريدك الإلكتروني" required>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label d-block text-center">التقييم</label>
                                <div class="rating-input">
                                    <input type="radio" id="star5" name="rating" value="5">
                                    <label for="star5">★</label>
                                    <input type="radio" id="star4" name="rating" value="4">
                                    <label for="star4">★</label>
                                    <input type="radio" id="star3" name="rating" value="3">
                                    <label for="star3">★</label>
                                    <input type="radio" id="star2" name="rating" value="2">
                                    <label for="star2">★</label>
                                    <input type="radio" id="star1" name="rating" value="1">
                                    <label for="star1">★</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">التعليق</label>
                                <textarea class="form-control" id="message" rows="4" placeholder="أخبرنا عن تجربتك مع منتجاتنا..." required></textarea>
                            </div>
                            
                            <button type="submit" class="btn-submit">
                                إرسال التقييم <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-labelledby="loginRequiredModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-5 p-4">
            <div class="modal-body text-center">
                <p class="fs-5 text-dark fw-semibold mb-3">يجب تسجيل الدخول أولاً حتى تتمكن من استخدام هذه الميزة</p>
                <i class="fas fa-lock fa-3x text-primary mb-3"></i>
                <p class="text-muted">يرجى تسجيل الدخول إلى حسابك للمتابعة.</p>
            </div>
            <div class="modal-footer border-0 d-flex justify-content-center">
                <a href="{{ route('auth.login') }}" class="btn btn-primary px-4">تسجيل الدخول</a>
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">إلغاء</button>
            </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollElements = document.querySelectorAll('.animate-on-scroll');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        scrollElements.forEach(element => { observer.observe(element); });
        const categoryCards = document.querySelectorAll('.category');
        categoryCards.forEach((card, index) => { card.style.transitionDelay = `${index * 0.1}s`; });
        const serviceItems = document.querySelectorAll('.service');
        serviceItems.forEach((item, index) => { item.style.transitionDelay = `${index * 0.2}s`; });
    });
</script>
@endpush
