<?php

namespace App\Http\Controllers;

use App\Models\productFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductFavoriteController extends Controller
{
    /**
     * Store a newly created favorite in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Check if the product is already in favorites
        $favorite = ProductFavorite::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($favorite) {
            // If it exists, toggle the favorite status
            $favorite->is_favorite = !$favorite->is_favorite;
            $favorite->save();
        } else {
            // If it does not exist, create a new favorite
            ProductFavorite::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'is_favorite' => true,
            ]);
        }

        return response()->json(['success' => 'Product favorite status updated.']);
    }

    /**
     * Remove the specified favorite from storage.
     */
    public function destroy($id)
    {
        $favorite = ProductFavorite::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['success' => 'Product removed from favorites.']);
        }

        return response()->json(['error' => 'Product not found in favorites.'], 404);
    }


    /**
     * Display the specified resource.
     */
    public function show(productFavorite $productFavorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(productFavorite $productFavorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, productFavorite $productFavorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

}
