<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryRequest;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    public function storeCategory(AddCategoryRequest $request)
    {
        try {
            $validatedInputs = $request->validated();

            // Handle image upload
            if ($request->hasFile('image')) {
                $validatedInputs['image'] = $request->file('image')->store(
                    'uploads/categories/' . date('Y'),
                    'public'
                );
            }

            // Create category
            Category::create([
                'name' => $validatedInputs['name'],
                'slug' => Str::slug($validatedInputs['name']),
                'description' => $validatedInputs['description'],
                'image' => $validatedInputs['image'] ?? null,
            ]);

            return to_route('admin.categories')
                ->with('success', 'Category Created Successfully');

        } catch (QueryException $e) {
            // Check if it's a duplicate entry error
            if ($e->errorInfo[1] == 1062) {
                return back()
                    ->withInput()
                    ->with('error', 'This category already exists. Please choose a different name.');
            }
            
            // For other database errors
            return back()
                ->withInput()
                ->with('error', 'An error occurred while saving the category.');
        }
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
