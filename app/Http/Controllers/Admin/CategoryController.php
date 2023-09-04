<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /* Show all Category  */

    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }

    public function AddCategory()
    {
        return view('admin.addcategory');
    }

    /* Add Category  */

    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);
        return redirect()->route('allcategory')->with('message', 'Category Added Successfully');
    }

    /* Edit Category */
    public function EditCategory($id)
    {
        $category_info = Category::findOrFail($id);

        return view('admin.editCategory', compact('category_info'));
    }

    public function UpdateCategory(Request $request)
    {
        $category_id = $request->category_id;

        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);

        return redirect()->route('allcategory')->with('message', 'Category Updated Successfully');
    }
    public function DeleteCategory($id)
    {
        Category::findOrfail($id)->delete();
        return redirect()->route('allcategory')->with('message', 'Category Deleted successfully!');
    }
}
