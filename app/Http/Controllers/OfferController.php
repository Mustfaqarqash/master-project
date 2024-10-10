<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\offersCategory;
use App\Models\product;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Fetch offers with relationships and search functionality
        $search = $request->input('search');
        $offers = Offer::with(['category', 'store', 'images'])
            ->when($search, function($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->paginate(5); // Adjust the pagination as per your requirement
        $stores  = store::all();
        $offerCategories =offersCategory::all();
        // Pass offers to the view
        return view('dashboard.offer.index', compact('offers', 'stores', 'offerCategories'));
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
    // Store a new offer
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'store_id' => 'required|exists:stores,id',
            'offers_category_id' => 'required|exists:offers_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ]);

        // Create a new offer instance
        $offer = new Offer();
        $offer->title = $validated['title'];
        $offer->description = $validated['description'];
        $offer->store_id = $validated['store_id'];
        $offer->offers_category_id = $validated['offers_category_id'];

        // Save the new offer to the database first to get the ID
        $offer->save(); // Make sure this is executed before handling the image

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Store the image
            $imagePath = $request->file('image')->store('offers', 'public');

            // Now you can create the image record with the valid offer ID
            $offer->images()->create(['path' => $imagePath, 'offer_id' => $offer->id]); // Adjust this if necessary
        }

        // Redirect with a success message
        return redirect()->route('offer.index')->with('success', 'Offer created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        // Assuming you have relationships set up in the Offer model
        // for favorites, ratings, and feedback
        $favorites = $offer->favorites; // Fetch related favorites for the offer
        $ratings = $offer->ratings; // Fetch related ratings for the offer
        $feedbacks = $offer->feedbacks; // Fetch related feedback for the offer

        // Return the show view with the offer and related data
        return view('dashboard.offer.show', compact('offer', 'favorites', 'ratings', 'feedbacks'));
    }


    public function edit($id)
    {
        $offer = Offer::findOrFail($id); // Retrieve the offer by its ID
        $stores = Store::all(); // Fetch all stores
        $offerCategories = offersCategory::all(); // Fetch all offer categories

        return view('dashboard.offer.edit', compact('offer', 'stores', 'offerCategories')); // Pass data to the edit view
    }

    // Update Offer
    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);

        // Validate form input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'store_id' => 'required|exists:stores,id',
            'offers_category_id' => 'required|exists:offers_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ]);

        // Update offer details
        $offer->title = $validated['title'];
        $offer->description = $validated['description'];
        $offer->store_id = $validated['store_id'];
        $offer->offers_category_id = $validated['offers_category_id'];

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($offer->image && Storage::exists('public/' . $offer->image->path)) {
                Storage::delete('public/' . $offer->image->path);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('offers', 'public');

            // Update the offer's image path (assuming you have a relationship or field for this)
            $offer->images()->updateOrCreate([], ['path' => $imagePath]); // or handle it as a field
        }

        // Save the updated offer
        $offer->save();

        // Redirect with success message
        return redirect()->route('offer.index')->with('success', 'Offer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(offer $offer)
    {
        //
    }
}
