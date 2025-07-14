<!-- start nav -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
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
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Bootstrap Navbar-1</h5>
                <button type="button" class="btn-close btn-close-dark shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- sidebar body -->
            <div class="offcanvas-body d-flex flex-column flex-lg-row p-2 p-lg-0">
                <ul class="navbar-nav justify-content-center align-items-center flex-grow-1 pe-3">
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
                </ul>
                <!-- login / Signup -->
                <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                    <a href="" class="text-dark">Login</a>
                    <a href="" class="text-dark text-decoration-none px-3 py-1 rounded-4" style="background-color: #28a2c7;">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</nav>