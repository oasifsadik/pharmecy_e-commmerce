<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $categories = Category::whereHas('product')
        ->with('product') // Eager load products for each category
        ->inRandomOrder()
        ->take(2)
        ->get();
        $products = ProductStock::inRandomOrder()->paginate(50);
        // return view('website.home',compact('categories','products'));
        return view('medWebsite.home',compact('categories','products'));
    }

    // public function singleProduct($id){
    //     $categories = Category::get();
    //     $product = Product::with('images')->find($id);
    //     $relatedProducts = Product::where('cat_id', $product->cat_id)
    //                           ->where('id', '!=', $id)
    //                           ->with('images')
    //                           ->take(15)
    //                           ->get();
    //     return view('website.singleProduct',compact('product','categories','relatedProducts'));
    // }
    public function singleProduct($id){
        // $categories = Category::get();
        $productStock = ProductStock::find($id);
        $product = $productStock->product; // Assuming you have a relationship set

        if (!$product) {
            abort(404, 'Product not found');
        }

        // Fetch related products from the same category
        // $relatedProducts = Product::where('cat_id', $product->cat_id)
        //                         ->where('id', '!=', $product->id) // Exclude current product
        //                         ->with('images') // Load images if needed
        //                         ->take(15)
        //                         ->get();
$relatedProducts = Product::where('cat_id', $product->cat_id)
        ->where('id', '!=', $product->id) // Exclude the current product
        ->whereHas('Stock', function ($query) {
            $query->where('product_quantity', '>', 0); // Only products with stock
        })
        ->with(['images', 'Stock']) // Load images and stock
        ->take(15)
        ->get();
        return view('medWebsite.singleProduct',compact('productStock','relatedProducts'));
    }
}
