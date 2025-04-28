<?php

namespace App\Http\Controllers\User;

use App\Models\Doctor;
use App\Models\LabTest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Ambulance;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    public function ambulanceServices(){
        $ambulances = Ambulance::where('status', 'Active')->latest()->get();
        return view('medWebsite.ambulance.index',compact('ambulances'));

    }
    public function ambulanceBookingForm($id)
    {
        if (auth()->check()) {
            $ambulance = Ambulance::findOrFail($id);

            $reviews = \App\Models\AmbulanceReview::where('ambulance_id', $ambulance->id)
                        ->with('user')
                        ->latest()
                        ->get();

            $averageRating = $reviews->avg('rating');
            $reviewCount = $reviews->count();

            return view('medWebsite.ambulance.bookingForm', compact('ambulance', 'reviews', 'averageRating', 'reviewCount'));
        } else {
            return redirect()->route('login')->with('message', 'Please Login First');
        }
    }

    public function labServices(){
        $labtests = LabTest::where('status', 'Active')->latest()->get();
        return view('medWebsite.lab.index',compact('labtests'));
    }
    public function labServicesBooking($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'Please login first to book a lab test.');
        }

        $labtest = LabTest::find($id);

        if (!$labtest) {
            return redirect()->back()->with('error', 'Lab Test not found.');
        }

        return view('medWebsite.lab.labBookingForm', compact('labtest'));
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

    public function doctors(){
        $doctors = Doctor::where('status', 'Approved')->latest()->get();
        return view('medWebsite.doctor.index',compact('doctors'));
    }

    public function shops(Request $request)
    {
        $categories = Category::whereHas('product')
            ->with('product')
            ->inRandomOrder()
            ->take(2)
            ->get();

        $query = ProductStock::with('product'); // eager load product relationship

        // Search by product name or generic name
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('product', function ($q) use ($search) {
                $q->where('product_name', 'like', '%' . $search . '%')
                ->orWhere('generic_name', 'like', '%' . $search . '%');
            });
        }

        $products = $query->inRandomOrder()->paginate(50);

        return view('medWebsite.shop.index', compact('categories', 'products'));
    }

    public function prescription(){
        if(Auth::check()){
            return view('medWebsite.prescription.index');
        }else{
            return redirect()->route('login')->with('message', 'Please login first for upload prescription.');
        }
    }
}
