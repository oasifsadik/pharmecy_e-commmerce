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
    public function showByGeneric($name)
{
    // Get all product stocks where related product's generic_name matches $name
    $products = \App\Models\ProductStock::with('product')
        ->whereHas('product', function ($q) use ($name) {
            $q->where('generic_name', 'like', '%' . $name . '%')
              ; // only active products
        })
        ->paginate(20);
        // dd($products);
    return view('medWebsite.shop.generic-products', compact('products', 'name'));
}
public function showByCategory($id)
{
    // Fetch all categories for sidebar (optional: you can cache or reuse)
    $categories = Category::all();

    // Fetch products with product stock filtered by category ID and active products only
    $products = ProductStock::with('product')
        ->whereHas('product', function ($q) use ($id) {
            $q->where('cat_id', $id); // only active products
        })
        ->paginate(20);

    // Get category name for title, breadcrumb, etc.
    $categoryName = Category::find($id)->name ?? 'Category';

    return view('medWebsite.shop.index', compact('categories', 'products', 'categoryName'));
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
    public function doctorAppointment($id){
        $doctor = Doctor::where('status', 'Approved')->find($id);
        return view('medWebsite.doctor.doctorAppointment',compact('doctor'));
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
        // dd($products);

        return view('medWebsite.shop.index', compact('categories', 'products'));
    }

    public function prescription(){
        if(Auth::check()){
            return view('medWebsite.prescription.index');
        }else{
            return redirect()->route('login')->with('message', 'Please login first for upload prescription.');
        }
    }
    public function search(Request $request)
{
    $query = $request->query('q');

    return Product::where('product_name', 'like', "%{$query}%")
        ->select('product_name')
        ->limit(10)
        ->get();
}

public function details(Request $request)
{
    $name = $request->query('name');

    $product = Product::where('product_name', $name)->first();

    if (!$product) {
        return response()->json(null, 404);
    }

    $stock = ProductStock::where('product_id', $product->id)->latest()->first();

    // Assuming you calculate dose prices manually or via extra fields
    return response()->json([
        'morning_price'   => $stock->selling_price / 3 ?? 0,
        'afternoon_price' => $stock->selling_price / 3 ?? 0,
        'night_price'     => $stock->selling_price / 3 ?? 0,
        'total_price'     => $stock->selling_price ?? 0,
    ]);
}

}
