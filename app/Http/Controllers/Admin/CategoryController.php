<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
     //Get Add Category
     public function getAddCategory(){
        $title = "Add Category - Selligion";
        return view('Backend.WebsiteAdmin.Category.add',[
            'title' => $title
        ]);
    }

    //Get Edit Category
    public function getEditCategory($id){
        $category = Category::findOrFail($id);
        $title = "Edit Category - Selligion";
        return view('Backend.WebsiteAdmin.Category.edit',[
            'title' => $title,
            'category' => $category,
        ]);
    }

    //Get All Category
    public function getAllCategory(){
        $title = "All Category - Selligion";
        $categories = Category::all();
        return view('Backend.WebsiteAdmin.Category.all',[
            'title' => $title,
            'categories' => $categories
        ]);
    }

    //Add Category
    public function addCategory(Request $request){
        $title = "Add Category - Selligion";
        $categoryExistCheck = Category::where('category_name',$request->category_name)->first();
        if($categoryExistCheck){
            return redirect()->back()->with('warning','Category with same name already Exists');
        }
        else{
            if ($request->hasFile('category_file')) {
                $catImg = $request->file('category_file');
                $catImgFileName = now()->timestamp . '-' . $catImg->getClientOriginalName();
                $catImg->move(public_path('img_store/categories'), $catImgFileName);
            }
            else{
                $catImgFileName = NULL;
            }
            $category = Category::create([
                'category_name' => $request->input('category_name'),
                'category_description' => $request->input('category_description'),
                'category_img_path' => 'img_store/categories/'.$catImgFileName,
            ]);
            return redirect()->back()->with('success','Category created Successfully');
        }
    }

    //Update Category
    public function updatecategory($id, Request $request){
        $category = Category::findOrFail($id);
        if ($request->hasFile('category_file')) {
            $catImg = $request->file('category_file');
            $catImgFileName = now()->timestamp . '-' . $catImg->getClientOriginalName();
            $catImg->move(public_path('img_store/categories'), $catImgFileName);
            $category->update([
                'category_name' => $request->input('category_name'),
                'category_description' => $request->input('category_description'),
                'category_img_path' => 'img_store/categories/'.$catImgFileName,
            ]);
        }
        else{
            $category->update([
                'category_name' => $request->input('category_name'),
                'category_description' => $request->input('category_description'),
            ]);
        }
        return redirect()->back()->with('success','Category updated Successfully');
    }

    //Delete Category
    //Get All Category
    public function deleteCategory($id){
        $productsCheckCount = Product::where('category_id',$id)->count();
        if($productsCheckCount >= 1){
            return redirect()->back()->with('warning','Category is associated with 1 or more Products');
        }
        else{
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->back()->with('success','Category deleted Successfully');
        }
    }
}
