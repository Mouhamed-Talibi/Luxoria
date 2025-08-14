<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHealthAndBeautyRequest;
use App\Models\Category;
use App\Models\HealthAndBeauty;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HealthAndBeautyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $health_beauty_products = Product::whereHas('health_beauty_Details')
            ->with([
                'health_beauty_Details',
                'images',
                'category',
            ])->paginate(6);
        return view('admin.health_beauty.index', compact('health_beauty_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.health_beauty.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHealthAndBeautyRequest $request)
    {
        $validatedFields = $request->validated();

        DB::transaction( function() use($validatedFields, $request) {
            $product = Product::create([
                'name' => $validatedFields['name'],
                'slug' => Str::slug($validatedFields['name']),
                'description_title' => $validatedFields['description_title'],
                'description' => $validatedFields['description'],
                'price' => $validatedFields['price'],
                'stock' => $validatedFields['stock'],
                'category_id' => $validatedFields['category_id'],
            ]);

            // save product details
            HealthAndBeauty::create([
                'product_id' => $product->id,
                'brand' => $validatedFields['brand'],
                'skin_type' => $validatedFields['skin_type'],
                'gender' => $validatedFields['gender'],
                'has_fragrance' => $validatedFields['has_fragrance'],
            ]);

            // files uploads
            if($request->hasFile('images')) {
                foreach($request->file('images') as $image) {
                    $path = $image->store('uploads/products/health_beauty', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $path
                    ]);
                }
            }
        });

        return redirect()->route('admin.products')
            ->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(HealthAndBeauty $healthAndBeauty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthAndBeauty $healthAndBeauty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthAndBeauty $healthAndBeauty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthAndBeauty $healthAndBeauty)
    {
        //
    }
}
