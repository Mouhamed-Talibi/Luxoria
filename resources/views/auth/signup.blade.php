@extends('layout.app')

@section('title')
    Signup
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 col-md-6">
                <form action="{{ route('auth.signup') }}" class="shadow p-3" method="POST">
                    @csrf

                    {{-- form image --}}
                    <div class="form-image">
                        <img src="{{ asset('assets/login-1.jpg') }}" alt="" class="img-fluid rounded-3">
                    </div>
                    <div class="form-input mt-3">
                        <div class="form-group">
                            <!-- Name Input -->
                            <div class="mb-4">  <!-- Increased margin-bottom -->
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fa-solid fa-user fs-5 text-secondary"></i>
                                    </span>
                                    <input type="text" name="name" class="form-control border-start-1 @error('name') is-invalid @enderror" 
                                        placeholder="Your name" value="{{ old('name') }}" autofocus>
                                </div>
                                @error('name')
                                    <div class="text-danger mt-2 small">{{ $message }}</div> 
                                @enderror
                            </div>

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

                            <!-- Gender Input -->
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fa-solid fa-venus-mars fs-5 text-secondary"></i>
                                    </span>
                                    <select name="gender" class="form-select border-start-0 @error('gender') is-invalid @enderror">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                                @error('gender')
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

                            <!-- Password Confirmation -->
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fa-solid fa-key fs-5 text-secondary"></i>
                                    </span>
                                    <input type="password" name="password_confirmation" class="form-control border-start-1" 
                                        placeholder="Confirm Your account password">
                                </div>
                                @error('password')
                                    <div class="text-danger mt-2 small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary mt-3 w-100">Signup</button>

                        <p class="text-center mt-3">
                            Already Have Account ? 
                            <a href="{{ route('auth.login_form')}}">Login</a>
                        </p>  
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection