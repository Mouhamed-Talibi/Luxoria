<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryRequest;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display dashboard
     */
    public function dashboard() {
        return view('admin.dashborad');
    }

    /**
     * Display add category form
     */
    public function addCategory() {
        return view('admin.add_category');
    }

    /**
     * store category
     */
    public function storeCategory(AddCategoryRequest $request) {
        $validatedInputs = $request->validated();

        // handle image upload
        if ($request->hasFile('image')) {
            $validatedInputs['image'] = $request->file('image')->store(
                'uploads/categories/' . date('Y'),
                'public'
            );
        }

        Category::create([
            'name' => $validatedInputs['name'],
            'slug' => str_replace(" ", "-", $validatedInputs['name']),
            'description' => $validatedInputs['description'],
            'image' => $validatedInputs['image'],
        ]);
        return to_route('admin.categories')
            ->with('success', 'Category Created Successfully');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
