<div dir="rtl">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/luxoria.png') }}" alt="Logo" width="70" height="70">
            </a>
            
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Offcanvas Menu -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">لكسوريا</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                
                <div class="offcanvas-body">
                    <!-- Main Navigation -->
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3 mb-3 mb-lg-0">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link active" href="#">الرئيسية</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                حولنا
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end text-end">
                                <li><a class="dropdown-item" href="#">من نحن</a></li>
                                <li><a class="dropdown-item" href="#">الخدمات</a></li>
                                <li><a class="dropdown-item" href="#">اتصل بنا</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <form class="d-flex mt-2 mt-lg-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ابحث عن منتجك">
                                    <button class="btn text-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                        @endauth
                    </ul>

                    <!-- Auth Section -->
                    <div class="d-flex flex-column flex-lg-row align-items-center gap-3">
                        @auth
                            <div class="d-flex align-items-center gap-3">
                                <!-- Cart Icon -->
                                <a href="#" class="btn position-relative p-2">
                                    <i class="fas fa-shopping-cart fs-5"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary" style="font-size: 0.6rem; padding: 0.25em 0.4em;">
                                        0
                                    </span>
                                </a>
                                
                                <!-- Logout Button -->
                                <button type="button" 
                                        class="btn btn-outline-danger rounded-circle p-0 d-flex align-items-center justify-content-center" 
                                        style="width: 2.5rem; height: 2.5rem;"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </div>
                        @endauth

                        @guest
                        <div class="d-flex flex-column flex-lg-row gap-3 w-100 justify-content-center">
                            <a href="{{ route('auth.login_form') }}" class="btn btn-outline-primary">تسجيل الدخول</a>
                            <a href="{{ route('auth.signup_form') }}" class="btn btn-primary">إنشاء حساب</a>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true" dir="rtl">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <i class="fas fa-sign-out-alt fa-3x text-danger mb-3"></i>
                    <h5 class="mb-3">تأكيد تسجيل الخروج</h5>
                    <p class="text-muted">سيتم إغلاق جلسة العمل الحالية</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary mx-2" data-bs-dismiss="modal">إلغاء</button>
                    <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger mx-2">تأكيد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>