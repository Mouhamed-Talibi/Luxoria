<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Session;

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

        // lang switch method
        public function langSwitch($locale) {
            if (in_array($locale, ['en', 'ar'])) {
            Session::put('locale', $locale);
        }
        return Redirect::back();
        }
    }
