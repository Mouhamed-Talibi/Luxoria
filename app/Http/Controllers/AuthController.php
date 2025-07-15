<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class AuthController extends Controller
    {
        // loginForm method
        public function loginForm() {
            return view('auth.login');
        }
    }
