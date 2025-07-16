@extends('layout.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 col-md-6">
                <form action="{{ route('auth.login') }}" class="shadow p-3" method="POST">
                    @csrf

                    {{-- form image --}}
                    <div class="form-image">
                        <img src="{{ asset('assets/login.jpg') }}" alt="" class="img-fluid rounded-3">
                    </div>
                    {{-- form input --}}
                    <div class="form-input mt-3">
                        <div class="form-group mt-4">
                            <!-- Email Input -->
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fa-solid fa-envelope fs-5 text-secondary"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control border-start-1 @error('email') is-invalid @enderror" 
                                        placeholder="Your email address" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <div class="text-danger mt-2 small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fa-solid fa-key fs-5 text-secondary"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control border-start-1 @error('password') is-invalid @enderror" 
                                        placeholder="Your account password">
                                </div>
                                @error('password')
                                    <div class="text-danger mt-2 small">{{ $message }}</div>
                                @enderror
                            </div>

                            <a href="#" class="text-info float-end">Forget Password ?</a>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 w-100">Login</button>
                        <p class="text-center mt-3">
                            Don't Have Account ? 
                            <a href="{{ route('auth.signup_form')}}" class="">Sign Up</a>
                        </p>  
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
