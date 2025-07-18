<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // categories index method
    public function index() {
        return view('admin.categories');
    }
}
