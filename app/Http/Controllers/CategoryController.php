<?php

    namespace App\Http\Controllers;

    use App\Models\Category;
    use Illuminate\Http\Request;

    class CategoryController extends Controller
    {
        // categories index method
        public function index() {
            $categories = Category::paginate(6);
            return view('admin.categories', compact('categories'));
        }
    }
