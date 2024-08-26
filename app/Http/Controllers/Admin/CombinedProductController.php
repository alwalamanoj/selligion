<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCombination;
use App\Models\CombinedProductList;

class CombinedProductController extends Controller
{
    //Get Add Product
    public function getAddProductCombination(){
        $title = "Add Product Combination - Selligion";
        $products = Product::all();
        return view('Backend.WebsiteAdmin.ProductCombination.add',[
            'title' => $title,
            'products' => $products,
        ]);
    }

    //Get Edit Category
    public function getEditProductCombination($id){
        $productCombination = ProductCombination::with('products')->findOrFail($id);
        $products = Product::all();
        $title = "Edit Product Combination- Selligion";
        return view('Backend.WebsiteAdmin.ProductCombination.edit',[
            'title' => $title,
            'products' => $products,
            'productCombination' => $productCombination,
        ]);
    }

    //Get All Category
    public function getAllProductCombination(){
        $title = "All Product Combinations - Selligion";
        $productCombinations = ProductCombination::all();
        return view('Backend.WebsiteAdmin.ProductCombination.all',[
            'title' => $title,
            'productCombinations' => $productCombinations
        ]);
    }

    //Add Product
    public function addProductCombination (Request $request){
        $title = "Add Product Combination- Selligion";
        if ($request->hasFile('combination_img')) {
            $pCI = $request->file('combination_img');
            $prodCombinationFileName = now()->timestamp . '-' . $pCI->getClientOriginalExtension();
            $pCI->move(public_path('img_store/product_combination_images'), $prodCombinationFileName);
        }
        $productCombination = ProductCombination::create([
            'combination_name' => $request->input('combination_name'),
            'combination_description' => $request->input('combination_description'),
            'combination_discount_price' => $request->input('combination_discount_price'),
            'status' => $request->input('status'),
            'combination_img_path' => 'img_store/product_combination_images/'.$prodCombinationFileName,
        ]);
        if($request->input('products')){
            foreach ($request->input('products') as $productId) {
                $combinedProductListProduct = CombinedProductList::create([
                    'product_id' => $productId,
                    'product_combination_id' => $productCombination->id,
                ]);
            }
        }
        return redirect()->back()->with('success','Product Combination created Successfully');
    }

    //Update Category
    public function updateProductCombination ($id, Request $request){
        $productCombination = ProductCombination::findOrFail($id);
        if ($request->hasFile('combination_img')) {
            $pCI = $request->file('combination_img');
            $prodCombinationFileName = now()->timestamp . '-' . $pCI->getClientOriginalExtension();
            $pCI->move(public_path('img_store/product_combination_images'), $prodCombinationFileName);
            $productCombination->update([
                'combination_name' => $request->input('combination_name'),
                'combination_description' => $request->input('combination_description'),
                'combination_discount_price' => $request->input('combination_discount_price'),
                'status' => $request->input('status'),
                'combination_img_path' => 'img_store/product_combination_images/'.$prodCombinationFileName,
            ]);
        }
        else{
            $productCombination->update([
                'combination_name' => $request->input('combination_name'),
                'combination_description' => $request->input('combination_description'),
                'combination_discount_price' => $request->input('combination_discount_price'),
                'status' => $request->input('status'),
            ]);
        }
        if($request->input('products')){
            foreach ($request->input('products') as $productId) {
                $combinedProductListProduct = CombinedProductList::create([
                    'product_id' => $productId,
                    'product_combination_id' => $productCombination->id,
                ]);
            }
        }
        return redirect()->back()->with('success','Product updated Successfully');
    }

    //Delete Category
    public function deleteProductCombination($id){
        $productCombination = ProductCombination::findOrFail($id);
        $productCombination->delete();
        return redirect()->back()->with('success','Product deleted Successfully');
    }

    //Delete Product Image
    public function deleteProductInCombination($id){
        $combinedProductList = CombinedProductList::findOrFail($id);
        $combinedProductList->delete();
        return redirect()->back()->with('success','Product deleted from the Commbination Successfully');
    }


}
