<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LabBooking;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(){
        $categories = Category::get();

        return view('medWebsite.profile.index',compact('categories'));
    }

    public function userOrder($id){
        $categories = Category::get();
        $userOrders = Order::where('user_id', $id)
                       ->whereNotIn('status', ['Delivered'])
                       ->paginate(5);
        return view('medWebsite.profile.userOrder',compact('userOrders','categories'));
    }
    public function userOrderDeliver($id){
        $categories = Category::get();
        $userOrders = Order::where('user_id', $id)
                       ->where('status','Delivered')
                       ->paginate(5);
        return view('medWebsite.profile.deliverOrder',compact('userOrders','categories'));
    }

    public function userLabTestBooking($id){
        $categories = Category::get();
        $userOrders = LabBooking::where('user_id', $id)
                       ->paginate(5);
                       dd($userOrders);
        return view('medWebsite.profile.userOrder',compact('userOrders','categories'));
    }

    public function showProductsByCategory($id)
    {
        $categories = Category::get();
        $category = Category::with('product')->findOrFail($id);

        $products = $category->product;

        return view('website.category_products', compact('category', 'products','categories'));
    }
}
