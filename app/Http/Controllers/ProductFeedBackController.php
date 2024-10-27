<?php

namespace App\Http\Controllers;

use App\Models\productFeedBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductFeedBackController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'feedback' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        // Create the feedback
        ProductFeedBack::create([
            'feedback' => $validated['feedback'],
            'user_id' => Auth::id(), // Use the currently authenticated user ID
            'product_id' => $validated['product_id'],
        ]);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }



    /**
     * Display the specified resource.
     */
    public function show(productFeedBack $productFeedBack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(productFeedBack $productFeedBack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, productFeedBack $productFeedBack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(productFeedBack $productFeedBack)
    {
        //
    }
}
