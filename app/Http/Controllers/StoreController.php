<?php

namespace App\Http\Controllers;

use App\Models\store;
use App\Models\city; // Import the City model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $cities = city::all();
        $stores = store::with('city')
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%")
                    ->orWhere('whatsapp', 'like', "%{$query}%");

            })
            ->paginate(5);

        // Retrieve the last store
        $lastStore = store::latest()->first(); // This gets the most recently created store

        return view('dashboard.store.index', compact('stores', 'lastStore','cities')); // Pass both variables to the view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = city::all(); // Get all cities to populate the select box
        return view('stores.create', compact('cities')); // Return the view for creating a new store
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'website' => 'url|nullable',
            'whatsapp' => 'string|nullable',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'city_id' => 'required|exists:cities,id',
        ]);

        // Handle the uploaded image
        $path = $request->file('image')->store('stores', 'public');

        // Create a new store
        store::create([
            'name' => $request->name,
            'description' => $request->description,
            'website' => $request->website,
            'whatsapp' => $request->whatsapp,
            'image' => $path,
            'city_id' => $request->city_id,
        ]);

        // Redirect back with a success message
        return redirect()->route('stores.index')->with('success', 'Store created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(store $store)
    {
        return view('stores.show', compact('store')); // Show store details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(store $store)
    {
        $cities = city::all(); // Get all cities to populate the select box
        return view('dashboard.store.edit', compact('store', 'cities')); // Return the edit view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, store $store)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'website' => 'required|url',
            'whatsapp' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'city_id' => 'required|exists:cities,id',
        ]);

        // Handle the uploaded image if it exists
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            Storage::disk('public')->delete($store->image);
            $path = $request->file('image')->store('stores', 'public');
            $store->image = $path; // Update the image path
        }

        // Update the store's attributes
        $store->update([
            'name' => $request->name,
            'description' => $request->description,
            'website' => $request->website,
            'whatsapp' => $request->whatsapp,
            'city_id' => $request->city_id,
        ]);

        // Redirect back with a success message
        return redirect()->route('stores.index')->with('success', 'Store updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(store $store)
    {
        // Delete the image from storage
        Storage::disk('public')->delete($store->image);

        // Soft delete the store
        $store->delete();

        // Redirect back with a success message
        return redirect()->route('stores.index')->with('success', 'Store deleted successfully!');
    }
}
