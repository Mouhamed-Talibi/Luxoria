<?php

namespace App\Http\Controllers;

use App\Models\ParfumDetail;
use Illuminate\Http\Request;

class ParfumDetailController extends Controller
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
        return view('admin.parfums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedFields = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'mark' => 'required|string',
            'volume' => 'required|string',
            'gender' => 'required|in:male,female',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        dd($validatedFields);
    }

    /**
     * Display the specified resource.
     */
    public function show(ParfumDetail $parfumDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParfumDetail $parfumDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParfumDetail $parfumDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParfumDetail $parfumDetail)
    {
        //
    }
}
