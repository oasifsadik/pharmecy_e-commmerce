<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductStockController extends Controller
{
    public function productStock()
    {
        $products = Product::get();
        return view('admin.productStock.index', compact('products'));
    }

    public function stockStore(Request $request){
        $request->validate([
            'product_id'            => 'required|exists:products,id',
            'manufacture_date'      => 'nullable|date',
            'expiry_date'           => 'nullable|date',
            'product_quantity'      => 'required|numeric|min:1',
            'inner_packet'          => 'nullable|numeric|min:1',
            'single_unit'           => 'nullable|numeric|min:1',
            'bottle_size'           => 'nullable|numeric|min:1',
            'buying_price'          => 'required|numeric|min:0',
            'selling_price'         => 'required|numeric|min:0',
            'inner_packet_price'    => 'nullable|numeric|min:0',
            'single_unit_price'     => 'nullable|numeric|min:0',
            'discount_type'         => 'nullable|in:TK,Percentages',
            'discount_value'        => 'nullable|numeric|min:0',
            'color'                 => 'nullable|string|max:255',
            'size'                  => 'nullable|string|max:255',
        ]);
        $productStock                       = new ProductStock();
        $productStock->product_id           = $request->product_id;
        $productStock->manufacture_date     = $request->manufacture_date;
        $productStock->expiry_date          = $request->expiry_date;
        $productStock->product_quantity     = $request->product_quantity;
        $productStock->inner_packet         = $request->inner_packet ?? 0;
        $productStock->single_unit          = $request->single_unit ?? 0;
        $productStock->bottle_size          = $request->bottle_size ?? 0;
        $productStock->buying_price         = $request->buying_price;
        $productStock->selling_price        = $request->selling_price;
        $productStock->inner_packet_price   = $request->inner_packet_price ?? 0;
        $productStock->single_unit_price    = $request->single_unit_price ?? 0;
        $productStock->discount_type        = $request->discount_type ?? null;
        $productStock->discount_value       = $request->discount_value ?? 0;
        $productStock->color                = $request->color ?? null;
        $productStock->size                 = $request->size ?? null;
        $productStock->save();
        return redirect()->back()->with('success', 'Product Stock Added Successfully');
    }

    public function productStockList()
    {
        $productStocks = ProductStock::with('product')->get();
        return view('admin.productStock.list', compact('productStocks'));
    }
    public function productStockView($id)
    {
        $productStocks = ProductStock::with('product')->find($id);
        return view('admin.productStock.stockView', compact('productStocks'));
    }
    public function productStockEdit($id)
    {
        $products = Product::get();
        $productStocks = ProductStock::with('product')->find($id);
        return view('admin.productStock.edit', compact('productStocks','products'));
    }
    public function productStockUpdate(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'product_id'            => 'required|exists:products,id',
            'manufacture_date'      => 'nullable|date',
            'expiry_date'           => 'nullable|date',
            'product_quantity'      => 'required|numeric|min:0',
            'inner_packet'          => 'nullable|numeric|min:0',
            'single_unit'           => 'nullable|numeric|min:0',
            'bottle_size'           => 'nullable|numeric|min:1',
            'buying_price'          => 'required|numeric|min:0',
            'selling_price'         => 'required|numeric|min:0',
            'inner_packet_price'    => 'nullable|numeric|min:0',
            'single_unit_price'     => 'nullable|numeric|min:0',
            'discount_type'         => 'nullable|in:TK,Percentages',
            'discount_value'        => 'nullable|numeric|min:0',
            'color'                 => 'nullable|string|max:255',
            'size'                  => 'nullable|string|max:255',
        ]);
        $productStock                       = ProductStock::with('product')->find($id);
        $productStock->product_id           = $request->product_id;
        $productStock->manufacture_date     = $request->manufacture_date;
        $productStock->expiry_date          = $request->expiry_date;
        $productStock->product_quantity     = $request->product_quantity;
        $productStock->inner_packet         = $request->inner_packet ?? 0;
        $productStock->single_unit          = $request->single_unit ?? 0;
        $productStock->bottle_size          = $request->bottle_size ?? 0;
        $productStock->buying_price         = $request->buying_price;
        $productStock->selling_price        = $request->selling_price;
        $productStock->inner_packet_price   = $request->inner_packet_price ?? 0;
        $productStock->single_unit_price    = $request->single_unit_price ?? 0;
        $productStock->discount_type        = $request->discount_type ?? null;
        $productStock->discount_value       = $request->discount_value ?? 0;
        $productStock->color                = $request->color ?? null;
        $productStock->size                 = $request->size ?? null;
        $productStock->update();
        return redirect()->route('admin.product.stock.list')->with('success', 'Product Stock Updated Successfully');
    }
    public function productStockDelete($id)
    {
        $productStock = ProductStock::find($id);
        $productStock->delete();
        return redirect()->back()->with('success', 'Product Stock Deleted Successfully');
    }

}
