<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|max:255',
            'brand_description' => 'nullable',
        ]);
        Brand::create([
            'brand_name' => $request->brand_name,
            'brand_description' => $request->brand_description,
        ]);
        return redirect()->back()->with('message' ,'Data Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand_name' => 'required|max:255',
            'brand_description' => 'nullable',
        ]);
        $brand = Brand::find($id);
        $brand->update([
            'brand_name' => $request->brand_name,
            'brand_description' => $request->brand_description,
        ]);
        return redirect()->back()->with('message' ,'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $productsCount = $brand->product()->count();

        if ($productsCount > 0) {
            return back()->with('error', 'Cannot delete Brand. It still has associated products.');
        }

        $brand->delete();
        return redirect()->back()->with('error','Data Delete Successfully');
    }
}
