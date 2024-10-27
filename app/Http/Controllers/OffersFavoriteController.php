<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\offers_favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffersFavoriteController extends Controller
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
    public function store(Request $request, $offerId)
    {
        $offer = Offer::findOrFail($offerId);
        $user_id = Auth::user()->id; // Get the authenticated user's ID

        // Check if the user has already favorited the offer
        $favorite = offers_favorite::where('user_id', $user_id)
            ->where('offer_id', $offerId)
            ->first();

        if ($favorite) {
            // If the offer is already favorited, remove it
            $favorite->delete();
        } else {
            // If not, add it to favorites
            offers_favorite::create([
                'user_id' => $user_id,
                'offer_id' => $offerId,
                'is_favorite' => true,
            ]);
        }

        return redirect()->back();
    }



    /**
     * Display the specified resource.
     */
    public function show(offers_favorite $offers_favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(offers_favorite $offers_favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, offers_favorite $offers_favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(offers_favorite $offers_favorite)
    {
        //
    }
}
