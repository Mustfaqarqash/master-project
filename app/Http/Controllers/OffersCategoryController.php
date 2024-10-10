<?php

namespace App\Http\Controllers;

use App\Models\offersCategory;
use App\Models\User;
use Illuminate\Http\Request;

class OffersCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Search functionality
        $search = $request->input('search');
        $categories = offersCategory::query() // Use query() instead of all()
        ->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })
            ->paginate(5);

        // Fetch the latest category
        $lastCategory = offersCategory::latest()->first();

        // Return view with data
        return view('dashboard.offer_category.index', compact('categories', 'lastCategory'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new category
        return view('offers_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ]);

        // Create the new category
        $category = new offersCategory();
        $category->name = $validated['name'];

        // Handle image upload if it exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->save();

        // Redirect to index with a success message
        return redirect()->route('offersCategory.index')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(offersCategory $offersCategory)
    {
        // Return the view to display a specific category
        return view('offers_categories.show', compact('offersCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $offerCategory = OffersCategory::findOrFail($id); // Fetch the offer category by ID
        $users = User::all(); // Assuming you need all users for the dropdown

        return view('dashboard.offer_category.edit', compact('offerCategory', 'users'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, offersCategory $offersCategory)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ]);

        // Update the category data
        $offersCategory->name = $validated['name'];

        // Handle image upload if it exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $offersCategory->image = $imagePath;
        }

        $offersCategory->save();

        // Redirect to index with a success message
        return redirect()->route('offersCategory.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(offersCategory $offersCategory)
    {
        // Delete the category
        $offersCategory->delete();

        // Redirect to index with a success message
        return redirect()->route('offersCategory.index')->with('success', 'Category deleted successfully!');
    }
}
