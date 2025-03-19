<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use App\Http\Requests\ProductsRequest;
use App\Models\ProductStock;
use Illuminate\Support\Facades\Storage;

class ProductsServices
{
    public function storeProduct(ProductsRequest $data){
         $discounted_price = $data['selling_price'];
         if($data['discount_type'] === 'TK')
         {
            $discounted_price -= $data['discount_value'];
         }
         elseif($data['discount_type'] === 'Percentages')
         {
            $discount_amount = ($data['discount_value'] / 100) * $data['selling_price'];
            $discounted_price -= $discount_amount;
         }
         $thumbnailPath = null;
            if ($data->hasFile('thumbnail')) {
                $thumbnailFile = $data->file('thumbnail');
                $thumbnailName = time() . '_' . $thumbnailFile->getClientOriginalName();
                $thumbnailPath = $thumbnailFile->storeAs('product_thumbnails', $thumbnailName, 'public');
            }
         $product = Product::create([
             'cat_id' => $data['cat_id'],
             'brand_id' => $data['brand_id'],
             'product_slug' => $data['product_slug'],
             'product_name' => $data['product_name'],
             'generic_name' => $data['generic_name'],
             'side_effects' => $data['side_effects'],
            //  'side_effects' => $data['side_effects'],
             'medicine_type' => $data['medicine_type'],
             'action' => $data['action'],
             'description' => $data['description'],
             'thumbnail' => $thumbnailPath,
         ]);
        //  dd($product);
         $productStockData = [];
         if ($data['medicine_type'] === 'tablet') {
            $productStockData['product_id'] = $product->id;
            $productStockData['product_quantity'] = $data['product_quantity'];
            $productStockData['inner_packet'] = $data['inner_packet'];
            $productStockData['single_unit'] = $data['single_unit'];
            $productStockData['buying_price'] = $data['buying_price'];
            $productStockData['selling_price'] = $data['selling_price'];
            $productStockData['inner_packet_price'] = $data['inner_packet_price'];
            $productStockData['single_unit_price'] = $data['single_unit_price'];
            $productStockData['manufacture_date'] = $data['manufacture_date'];
            $productStockData['expiry_date'] = $data['expiry_date'];
            $productStockData['discount_price'] = $discounted_price;
            $productStockData['discount_type'] = $data['discount_type'];
            $productStockData['discount_value'] = $data['discount_value'];
        }elseif($data['medicine_type'] === 'bottle'){
            $productStockData['product_id'] = $product->id;
            $productStockData['product_quantity'] = $data['product_quantity'];
            $productStockData['bottle_size'] = $data['bottle_size'];
            $productStockData['buying_price'] = $data['buying_price'];
            $productStockData['selling_price'] = $data['selling_price'];
            $productStockData['discount_price'] = $discounted_price;
            $productStockData['discount_type'] = $data['discount_type'];
            $productStockData['discount_value'] = $data['discount_value'];
            $productStockData['manufacture_date'] = $data['manufacture_date'];
            $productStockData['expiry_date'] = $data['expiry_date'];
        }elseif($data['medicine_type'] === 'general'){
            $productStockData['product_id'] = $product->id;
            $productStockData['product_quantity'] = $data['product_quantity'];
            $productStockData['buying_price'] = $data['buying_price'];
            $productStockData['selling_price'] = $data['selling_price'];
            $productStockData['discount_price'] = $discounted_price;
            $productStockData['discount_type'] = $data['discount_type'];
            $productStockData['discount_value'] = $data['discount_value'];
            $productStockData['color'] = $data['color'];
            $productStockData['size'] = $data['size'];
            $productStockData['manufacture_date'] = $data['manufacture_date'];
            $productStockData['expiry_date'] = $data['expiry_date'];
        }
        ProductStock::create($productStockData);

         if ($data->hasFile('images')) {
            $images = [];
            foreach ($data['images'] as $image) {
                if (count($images) < 5) { // Ensure maximum of 5 images
                    $imageName = $image->store('product_images', 'public');
                    $images[] = ['image_path' => $imageName];
                } else {
                    break;
                }
            }
            $product->images()->createMany($images);
        }
        return $product;
    }

    public function updateProduct(ProductsRequest $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return false; // Handle case where product does not exist
        }

        // Calculate discounted price
        $discounted_price = $request->input('selling_price');
        if ($request->input('discount_type') === 'TK') {
            $discounted_price -= $request->input('discount_value');
        } elseif ($request->input('discount_type') === 'Percentages') {
            $discount_amount = ($request->input('discount_value') / 100) * $request->input('selling_price');
            $discounted_price -= $discount_amount;
        }

        // Update product
        $product->update([
            'cat_id' => $request->input('cat_id'),
            'product_slug' => $request->input('product_slug'),
            'product_name' => $request->input('product_name'),
            'product_quantity' => $request->input('product_quantity'),
            'buying_price' => $request->input('buying_price'),
            'selling_price' => $request->input('selling_price'),
            'discount_price' => $discounted_price,
            'discount_type' => $request->input('discount_type'),
            'discount_value' => $request->input('discount_value'),
            'color' => $request->input('color'),
            'size' => $request->input('size'),
            'action' => $request->input('action'),
            'description' => $request->input('description'),
        ]);

        return $product;
    }

    protected function updateProductImages(Product $product, $images)
    {
        // Delete existing images from storage
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        // Add new images
        foreach ($images as $image) {
            $imageName = $image->store('product_images', 'public');
            $product->images()->create(['image_path' => $imageName]);
        }
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return false; // Handle case where product does not exist
        }

        // Delete associated images
        $this->deleteProductImages($product);

        // Delete the product itself
        $product->delete();

        return true;
    }
    protected function deleteProductImages($product)
    {
        // Get all images associated with the product
        $images = $product->images;

        foreach ($images as $image) {
            // Delete image file from storage
            Storage::disk('public')->delete($image->image_path);
            // Delete image record from database
            $image->delete();
        }
    }

}
