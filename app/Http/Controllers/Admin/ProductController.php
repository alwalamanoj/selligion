<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tax;
use App\Models\Product;
use App\Models\ProductImage;


class ProductController extends Controller
{
    //Get Add Product
    public function getAddProduct(){
        $title = "Add Product - Selligion";
        $categories = Category::all();
        $taxes = Tax::all();
        return view('Backend.WebsiteAdmin.Product.add',[
            'title' => $title,
            'categories' => $categories,
            'taxes' => $taxes,
        ]);
    }

    //Get Edit Category
    public function getEditProduct($id){
        $product = Product::with('images')->findOrFail($id);
        $categories = Category::all();
        $taxes = Tax::all();
        $title = "Edit Product - Selligion";
        return view('Backend.WebsiteAdmin.Product.edit',[
            'title' => $title,
            'product' => $product,
            'categories' => $categories,
            'taxes' => $taxes,
        ]);
    }

    //Get All Category
    public function getAllProduct(){
        $title = "All Product - Selligion";
        $products = Product::all();
        return view('Backend.WebsiteAdmin.Product.all',[
            'title' => $title,
            'products' => $products
        ]);
    }

    //Add Product
    public function addProduct(Request $request){
        $title = "Add Product - Selligion";
            $product = Product::create([
                'product_name' => $request->input('product_name'),
                'product_description' => $request->input('product_description'),
                'product_price' => $request->input('product_price'),
                'tax_id' => $request->input('tax_id'),
                'category_id' => $request->input('category_id'),
                'slug' => $request->input('slug'),
                'sku' => $request->input('sku'),
                'quantity' => $request->input('quantity'),
                'status' => $request->input('status'),
                'addOn' => $request->input('addOn'),
                'hsn_sac_code' => $request->input('hsn_sac_code'),
            ]);
            if ($request->hasFile('product_images')) {
                foreach ($request->file('product_images') as $image) {
                    $prodFileName = now()->timestamp . '-' . $image->getClientOriginalName();
                    $image->move(public_path('img_store/product_images'), $prodFileName);
                    $prodImageStore = ProductImage::create([
                        'product_id' => $product->id,
                        'product_img_path' => 'img_store/product_images/'.$prodFileName,
                    ]);
                }
            }

            return redirect()->back()->with('success','Product created Successfully');
    }

    //Update Category
    public function updateProduct($id, Request $request){
        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'product_price' => $request->input('product_price'),
            'tax_id' => $request->input('tax_id'),
            'category_id' => $request->input('category_id'),
            'sku' => $request->input('sku'),
            'slug' => $request->input('slug'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            'addOn' => $request->input('addOn'),
            'hsn_sac_code' => $request->input('hsn_sac_code'),
        ]);
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                // Add a check to ensure the file is an image
                if ($image->isValid()) {
                    $prodFileName = now()->timestamp . '-' . $image->getClientOriginalName();
                    $image->move(public_path('img_store/product_images'), $prodFileName);

                    $prodImageStore = ProductImage::create([
                        'product_id' => $product->id,
                        'product_img_path' => 'img_store/product_images/' . $prodFileName,
                    ]);
                }
            }
        }
        // dd($prodImageStore);
        return redirect()->back()->with('success','Product updated Successfully');
    }

    //Delete Category
    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success','Product deleted Successfully');
    }

    //Delete Product Image
    public function deleteProductImage($id){
        $productImage = ProductImage::findOrFail($id);
        $productImage->delete();
        return redirect()->back()->with('success','Product Image deleted Successfully');
    }
}
