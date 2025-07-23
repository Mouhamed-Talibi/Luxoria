<!-- start nav -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- logo -->
        <a class="navbar-brand fs-4" href="#">
            <img src="{{ asset('assets/luxoria.png') }}" alt="" style="height:70px; width:70px;">
        </a>
        <!-- toggle btn -->
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- sidebar -->
        <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <!-- sidebar header -->
            <div class="offcanvas-header text-dark borde-bottom">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Luxoria</h5>
                <button type="button" class="btn-close btn-close-dark shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- sidebar body -->
            <div class="offcanvas-body d-flex flex-column flex-lg-row p-2 p-lg-0">
                <ul class="navbar-nav justify-content-center align-items-center flex-grow-1 pe-3">
                    {{-- auth links --}}
                    @auth
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item mx-2">
                            <form class="d-flex align-items-center">
                                <div class="input-group">
                                    <input type="text" name="search_input" placeholder="Find your product" class="form-control">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-magnifying-glass text-light"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                        {{-- lang switcher --}}
                        <div class="dropdown mx-3">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ strtoupper(app()->getLocale()) }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('app.lang.switch', 'en') }}">English</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('app.lang.switch', 'ar') }}">العربية</a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </ul>

                {{-- logout link --}}
                <form action="{{route('app.logout')}}" class="d-inline float-end" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fa-duotone fa-solid fa-right-from-bracket"></i>
                        Logout
                    </button>
                </form>

                @guest
                    <!-- login / Signup -->
                    <div class="auth-links d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                        <a href="{{ route('auth.login_form') }}" class="login">Login</a>
                        <a href="{{ route('auth.signup_form') }}" class="text-decoration-none px-3 py-1 rounded-4 signup">Sign Up</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>