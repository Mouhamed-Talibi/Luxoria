<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class AppController extends Controller
    {
        // home method
        public function home() {
            return view('home');
        }

        // index method
        public function index() {
            return view('app.index');
        }
    }
