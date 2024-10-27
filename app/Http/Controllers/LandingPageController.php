<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\product;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index()
    {
//        dd(Auth::user()->id);
        // Eager load 'rates' and 'feedbacks' relationships to reduce queries
        $products = product::with(['image', 'subCategory', 'rates', 'feedbacks'])->limit(8)-> get();
        $subCategories = subCategory::all();

        // Manually calculate average rating and total reviews for each product
        $products->each(function ($product) {
            $product->averageRating = $product->rates->count() > 0 ? $product->rates->sum('rate') / $product->rates->count() : 0;
            $product->totalReviews = $product->feedbacks->count();
        });
        $featuerdProducts = product::with(['image', 'subCategory', 'rates', 'feedbacks'])->limit(4)->get();

        $categories = subCategory::with(['products.image'])->limit(3)->get(); // Load categories with products and their images

        $offers = offer::with('category' ,'store' , 'images','rates','favorites','feedbacks' )->get();
        return view('userSide.landingPage.index', [
            'products' => $products,
            'subCategories' => $subCategories,
            'featuerdProducts'=>$featuerdProducts,
            'categories' => $categories,
            'offers' => $offers
        ]);
    }


}
