<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductCategory;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(6);
        $trashedProducts = Product::onlyTrashed()->paginate(6);
        return view('admin.products', compact(['products', 'trashedProducts']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.add_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {
        $validatedData = $request->validated(); // Fixed method name
        
        // Generate slug
        $slug = Str::slug($validatedData['name']);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')
                ->store('uploads/products/'.date('Y'), 'public');
        }

        // Check if product exists (fixed condition)
        if (Product::where('slug', $slug)->orWhere('name', $validatedData['name'])->exists()) {
            return back()
                ->withInput()
                ->with('error', 'A product with this name already exists');
        }

        // Create product (ensure all required fields are included)
        Product::create([
            'name' => $validatedData['name'],
            'slug' => $slug,
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'category_id' => $validatedData['category'],
            'image' => $validatedData['image'] ?? null,
        ]);

        return to_route('admin.products')
            ->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.edit_product', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();

            // Handle image upload if present
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
                
                $validatedData['image'] = $request->file('image')
                    ->store('uploads/products/'.date('Y'), 'public');
            }

            // Update product
            $product->update([
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['name']),
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'stock' => $validatedData['stock'],
                'category_id' => $validatedData['category'],
                'image' => $validatedData['image'] ?? $product->image,
            ]);

            DB::commit();

            return to_route('admin.products')
                ->with('success', 'Product updated successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product update failed: ' . $e->getMessage());
            
            return back()
                ->withInput()
                ->with('error', 'Failed to update product. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::findOrFail($product->id)->delete();
        return to_route('admin.products')
            ->with('success', 'Product deleted successfully');
    }

    /**
     * Retore the specified resource from storage.
     */
    public function restore($product)
    {
        $product = Product::withTrashed()->findOrFail($product);
        $product->restore();
        return to_route('admin.products')
            ->with('success', 'Product Restored successfully');
    }
}
