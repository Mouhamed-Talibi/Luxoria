<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- csrf-token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- fav icon --}}
    <link rel="icon" href="{{ asset('assets/luxoria-1.png') }}" type="image/png">
    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Relief:wght@400;700&family=Inconsolata:wght@200..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lexend:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">


    {{-- title --}}
    <title>
        Luxoria - @yield('title')
    </title>

    {{-- bootstrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    {{-- font awesom --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- css link --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    {{-- loader --}}
    <div id="loader" class="loader-container">
        <div class="loader"></div>
        <p>Loading Luxoria, Please Wait..</p>
    </div>

    {{-- content site --}}
    <div id="content">
        <!-- Flash messages component -->
        <x-flashbacks />

        {{-- main content --}}
        <div class="wrapper d-flex">
            <!-- Sidebar -->
            <aside class="sidebar col-md-3 col-lg-2 d-md-block">
                <div class="sidebar-header">
                    <h4>Luxoria</h4>
                    <hr class="text-primary">
                </div>
                <ul class="nav flex-column px-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-people"></i> Categories 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.add_category') }}">
                                    <i class="bi bi-person-plus me-2"></i> New Category 
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.categories')}}">
                                    <i class="bi bi-list-ul me-2"></i> Catgeories List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-people"></i> Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                            <li>
                                <a class="dropdown-item" href="">
                                    <i class="bi bi-person-plus me-2"></i> New Product
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">
                                    <i class="bi bi-list-ul me-2"></i> Products List
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>

            <!-- Main Content -->
            <div class="main-content w-100">
                <!-- Top Navbar -->
                <nav class="navbar navbar-expand-lg top-navbar mb-4 shadow-none">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none" id="sidebarToggle">
                            <i class="fa-solid fa-list text-dark fs-4"></i>
                        </button>

                        <div class="d-flex ms-auto align-items-center">
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>
                                        <img src="{{ asset('assets/user.png ')}}" alt="" class="img-fluid rounded-circle"
                                            style="width: 50px; height: 50px; object-fit: cover;">
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                    <li><a class="dropdown-item" href="">Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <!-- Logout Modal -->
                            <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 text-center p-4">
                                        <!-- Icon and Message -->
                                        <div class="modal-icon-wrapper my-4">
                                            <div class="logout-icon bg-soft-danger text-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                                <i class="fa-solid fa-right-from-bracket fa-2x"></i>
                                            </div>
                                            <h5 class="fw-bold mb-3">Ready to Leave?</h5>
                                            <p class="text-muted px-3">Are you sure you want to log out of your account?</p>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-flex justify-content-center gap-3 mb-2">
                                            <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <form action="{{ route('auth.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger px-4">
                                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                {{-- page content --}}
                @yield('content')

            </div>
            <!-- Overlay for mobile sidebar -->
            <div class="overlay"></div>
        </div>
    </div>


    @stack('scripts')


    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    {{-- loader js --}}
    <script src="{{ asset('js/loader.js') }}"></script>
    {{-- sidebar js --}}
    <script src="{{ asset('js/sidebar.js')}}"></script>
</body>
</html>