@extends('layout.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 col-md-6">
                <form action="" class="shadow p-3">
                    {{-- form image --}}
                    <div class="form-image">
                        <img src="{{ asset('assets/signup.jpg') }}" alt="" class="img-fluid rounded-3">
                    </div>
                    {{-- form input --}}
                    <div class="form-input mt-3">
                        <h2 class="text-center">Login to Continue</h2>

                        <div class="form-group">
                            <!-- Email input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fa-solid fa-envelope fs-5 text-secondary"></i>
                                </span>
                                <input type="email" name="email" class="form-control border-start-0" placeholder="Your email address" required>
                            </div>

                            <!-- Password input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fa-solid fa-key fs-5 text-secondary"></i>
                                </span>
                                <input type="password" name="password" class="form-control border-start-0" placeholder="Your account password" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
