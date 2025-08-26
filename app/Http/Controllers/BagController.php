<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBagsRequest;
use App\Models\Bag;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Str;

class BagController extends Controller
{
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
        $categories = Category::all();
        return view('admin.bags.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBagsRequest $request)
    {
        $validatedFields = $request->validated();

        DB::transaction( function() use($validatedFields, $request) {
            $product = Product::create([
                'name' => $validatedFields['name'],
                'slug' => Str::slug($validatedFields['name']),
                'description_title' => $validatedFields['description_title'],
                'description' => $validatedFields['description'],
                'price' => $validatedFields['price'],
                'old_price' => $validatedFields['old_price'],
                'stock' => $validatedFields['stock'],
                'category_id' => $validatedFields['category_id'],
            ]);

            // save product details
            Bag::create([
                'product_id' => $product->id,
                'brand' => $validatedFields['brand'],
                'size' => $validatedFields['size'],
                'external_material' => $validatedFields['external_material'],
                'weight' => $validatedFields['weight'],
            ]);

            // files uploads
            if($request->hasFile('images')) {
                foreach($request->file('images') as $image) {
                    $path = $image->store('uploads/products/bags', 'public');
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
    public function show(Bag $bag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bag $bag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bag $bag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bag $bag)
    {
        //
    }
}
