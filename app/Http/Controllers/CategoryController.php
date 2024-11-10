<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Search categories by name or description
        $search = $request->input('search');
        $categories = Category::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })->paginate(5);

        // Fetch the last added category
        $lastCategory = Category::latest()->first();
        $users =User::all()->where('role' , 'admin');

        return view('dashboard.category.index', compact('categories', 'lastCategory' , 'users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users =User::all();
       return view('dashboard.category.create' , compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048' // Validate the image file
        ]);

        // Handle file upload if an image is provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
        }

        // Create new category
        category::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => $imagePath, // Save image path if uploaded

        ]);

        // Redirect back to the category index with success message
        return redirect()->route('category.index')->with('success', 'Category added successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

        $subCategories = $category->subcategories;

        return view('dashboard.category.show', compact('category', 'subCategories'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $category)
    {

        $category=category::find($category);
        $users =User::all()->where('role' , 'admin');
       return view('dashboard.category.edit', compact('category' , 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ]);

        // Find the category by its ID
        $category = Category::findOrFail($id);

        // Update category details
        $category->name = $request->name;
        $category->description = $request->description;
        $category->user_id = $request->user_id;

        // Check if a new image has been uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($category->image) {
                Storage::delete('public/' . $category->image);
            }

            // Store the new image and update the category image path
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        // Save updated category data
        $category->save();

        // Redirect back to the category index with success message
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the category by its ID
        $category = Category::findOrFail($id);

        // Delete the category image if it exists
        if ($category->image) {
            Storage::delete('public/' . $category->image);
        }

        // Delete the category
        $category->delete();

        // Redirect back to the category index with success message
        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }


}
