<div dir="rtl">
    <!-- البداية: شريط التنقل -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- الشعار -->
            <a class="navbar-brand fs-4" href="#">
                <img src="{{ asset('assets/luxoria.png') }}" alt="" style="height:70px; width:70px;">
            </a>
            <!-- زر التبديل -->
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- الشريط الجانبي -->
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <!-- رأس الشريط الجانبي -->
                <div class="offcanvas-header text-dark borde-bottom">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">لكسوريا</h5>
                    <button type="button" class="btn-close btn-close-dark shadow-none" data-bs-dismiss="offcanvas" aria-label="إغلاق"></button>
                </div>
                <!-- جسم الشريط الجانبي -->
                <div class="offcanvas-body d-flex flex-column flex-lg-row p-2 p-lg-0">
                    <ul class="navbar-nav justify-content-center align-items-center flex-grow-1 pe-3">
                        @auth
                            <li class="nav-item mx-2">
                                <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">من نحن</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">الخدمات</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">اتصل بنا</a>
                            </li>
                            <li class="nav-item mx-2">
                                <form class="d-flex align-items-center">
                                    <div class="input-group">
                                        <input type="text" name="search_input" placeholder="ابحث عن منتجك" class="form-control">
                                        <button type="submit" class="btn">
                                            <i class="fa-solid fa-magnifying-glass text-primary"></i>
                                        </button>
                                    </div>
                                </form>
                            </li>
                            <!-- مبدل اللغة -->
                            <div class="dropdown mx-3">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ strtoupper(app()->getLocale()) }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('app.lang.switch', 'ar') }}">العربية</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('app.lang.switch', 'en') }}">English</a>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </ul>

                    @auth
                        <!-- زر تسجيل الخروج -->
                        <form action="{{ route('auth.logout') }}" class="d-inline float-end" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fa-duotone fa-solid fa-right-from-bracket"></i>
                                تسجيل الخروج
                            </button>
                        </form>
                    @endauth

                    @guest
                        <!-- تسجيل الدخول / إنشاء حساب -->
                        <div class="auth-links d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                            <a href="{{ route('auth.login_form') }}" class="login">تسجيل الدخول</a>
                            <a href="{{ route('auth.signup_form') }}" class="text-decoration-none px-3 py-1 rounded-4 signup">إنشاء حساب</a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</div>
