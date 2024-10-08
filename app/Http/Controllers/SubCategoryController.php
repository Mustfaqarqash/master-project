<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\subCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Search functionality
        $search = $request->input('search');
        $categories = category::all();
        // Fetch subcategories, with eager loading of their associated categories
        $subcategories = subCategory::with('category')
            ->when($search, function($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            })
            ->paginate(5);  // Paginate results, 10 per page

        // Get the last added subcategory
        $lastSubCategory = subCategory::latest()->first();

        // Return view with data
        return view('dashboard.sub_category.index', compact('subcategories', 'lastSubCategory' ,'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validate image
        ]);

        // Handle image upload if provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subcategory_images', 'public'); // Store image in 'public/subcategory_images'
        }

        // Create a new subcategory
        subCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imagePath, // Save image path in the database
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Subcategory created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(subCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subCategory $subCategory)
    {
        $categories = category::all();
        return view('dashboard.sub_category.edit', compact('subCategory' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subCategory $subCategory)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Update subcategory
        $subCategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        // Redirect with a success message
        return redirect()->route('subCategory.index')->with('success', 'Subcategory updated successfully!');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subCategory $subCategory)
    {
        // Soft delete the subcategory
        $subCategory->delete();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Subcategory deleted successfully!');
    }

}
