<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.allproduct', compact('products'));
    }

    public function AddProduct()
    {
        $categories = Category::latest()->get();

        $subcategories = Subcategory::latest()->get();
        return view('admin.addproduct', compact('categories', 'subcategories'));
    }

    public function StoreProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_desc' => 'required',
            'product_long_desc' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        $category_id = $request->product_category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_id = $request->product_subcategory_id;
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');
        Product::insert([
            'product_name' => $request->product_name,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,
            'price' => $request->price,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' =>  $category_id,
            'product_subcategory_id' =>  $subcategory_id,
            'product_img' => $img_url,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),

        ]);
        Category::where('id', $category_id)->increment('product_count', 1);
        Subcategory::where('id', $subcategory_id)->increment('product_count', 1);
        return redirect()->route('allproducts')->with('message', 'Product Added Successfully');
    }

    public function EditProduct($id)
    {
        $product_info = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.editproduct', compact('product_info', 'categories', 'subcategories'));
    }

    public function EditProductImg($id)
    {
        $product_info = Product::findorFail($id);
        return view('admin.editproductimg', compact('product_info'));
    }

    public function UpdateProductImg(Request $request)
    {
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = $request->id;
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        Product::findOrfail($id)->update([
            'product_img' => $img_url,
        ]);

        return redirect()->route('allproducts')->with('message', 'Image Product Updated Successfully');
    }

    public function UpdateProduct(Request $request)
    {
        $product_id = $request->id;

        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_desc' => 'required',
            'product_long_desc' => 'required',
        ]);

        Product::findOrfail($product_id)->update([
            'product_name' => $request->product_name,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
        ]);
        return redirect()->route('allproducts')->with('message', 'Product Updated Successfully');
    }

    public function DeleteProduct($id)
    {
        Product::findOrfail($id)->delete();
        $category_id = Product::where('id', $id)->value('product_category_id');
        $subcategory_id = Product::where('id', $id)->value('product_subcategory_id');
        Category::where('id', $category_id)->decrement('product_count', 1);
        Subcategory::where('id', $subcategory_id)->decrement('product_count', 1);
        return redirect()->route('allproducts')->with('message', 'Product Deleted successfully!');
    }

}
