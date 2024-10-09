<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\product;
use App\Models\store;
use App\Models\subCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Search functionality
        $search = $request->input('search');
        $stores = store::all();
        $subCategories = subCategory::all();
        // Fetch last product added
        $lastProduct = Product::latest()->first();

        // Fetch all products with pagination
        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        }

        $products = $query->with('subCategory', 'store', 'image')->paginate(10);

        return view('dashboard.product.index', compact('products', 'lastProduct','stores','subCategories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all();
        $subCategories = SubCategory::all();
        return view('dashboard.product.create', compact('stores', 'subCategories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'quantity' => 'required|integer',
            'store_id' => 'required|exists:stores,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'expire_date' => 'required|date' // Ensure it's validated as a date
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('products', 'public');

        // Store product using mass assignment
        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'discount' => $validated['discount'], // Use the value from the request
            'quantity' => $validated['quantity'],
            'store_id' => $validated['store_id'],
            'sub_category_id' => $validated['sub_category_id']
//            'expire_date' => $validated['expire_date'], // Add expire_date here
        ]);
        image::create([
            'product_id' => $product->id,
            'path' => $imagePath,
        ]);

        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        // Load related feedback, ratings, and favorites
        $feedbacks = $product->feedbacks()->with('user')->get();
        $ratings = $product->rates()->with('user')->get();
        $favorites = $product->favorites()->where('is_favorite', true)->with('user')->get();

        return view('dashboard.product.show', compact('product', 'feedbacks', 'ratings', 'favorites'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $stores  = Store::all();
        $subCategories = SubCategory::all();
        return view('dashboard.product.edit', compact('product' , 'stores', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'quantity' => 'required|integer',
            'store_id' => 'required|exists:stores,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Make image optional
            'expire_date' => 'nullable|date' // Make expiration date optional
        ]);

        // Update product details
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->discount = $validated['discount'];
        $product->quantity = $validated['quantity'];
        $product->store_id = $validated['store_id'];
        $product->sub_category_id = $validated['sub_category_id'];

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                $oldImagePath = storage_path('app/public/' . $product->image->path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $product->image->delete(); // Remove the old image record
            }

            // Store new image
            $imagePath = $request->file('image')->store('products', 'public');

            // Create a new image record for the product
            image::create([
                'product_id' => $product->id,
                'path' => $imagePath,
            ]);
        }

        // Update expire date if provided
        if ($request->filled('expire_date')) {
            $product->expire_date = $validated['expire_date'];
        }

        // Save updated product details
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }
}
