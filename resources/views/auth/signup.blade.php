@extends('layout.app')

@section('title')
    Signup
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 col-md-6">
                <form action="" class="shadow p-3">
                    {{-- form image --}}
                    <div class="form-image">
                        <img src="{{ asset('assets/signup.jpg') }}" alt="" class="img-fluid rounded-3">
                    </div>
                    {{-- form input --}}
                    <div class="form-input mt-3">
                        <div class="form-group mt-4">
                            <!-- username input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fa-solid fa-user fs-5 text-secondary"></i>
                                </span>
                                <input type="name" name="name" class="form-control border-start-0" placeholder="Your name" autofocus>
                            </div>

                            <!-- Email input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fa-solid fa-envelope fs-5 text-secondary"></i>
                                </span>
                                <input type="email" name="email" class="form-control border-start-0" placeholder="Your email address">
                            </div>

                            <!-- phone input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fa-solid fa-phone fs-5 text-secondary"></i>
                                </span>
                                <input type="number" name="phone" class="form-control border-start-0" placeholder="Your phone number">
                            </div>

                            <!-- Password input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fa-solid fa-key fs-5 text-secondary"></i>
                                </span>
                                <input type="password" name="password" class="form-control border-start-0" placeholder="Your account password">
                            </div>

                            <!-- Password confirm input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fa-solid fa-key fs-5 text-secondary"></i>
                                </span>
                                <input type="password" name="password_confirmation" class="form-control border-start-0" placeholder="Confirm Your account password" autofocus>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary mt-3 w-100">Signup</button>
                        <p class="text-center mt-3">
                            Already Have Account ? 
                            <a href="{{ route('auth.login_form')}}" class="">Login</a>
                        </p>  
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
