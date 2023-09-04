<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\TextUI\Output\Default\ProgressPrinter\Subscriber;

class SubCategoryController extends Controller
{
    public function index()
    {
        $allsubcategories = Subcategory::latest()->get();
        return view('admin.allsubcategory', compact('allsubcategories'));
    }
    public function AddSubCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.addsubcategory', compact('categories'));
    }
    /* Add Sub Category  */

    public function StoreSubCategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'category_id' =>  $category_id,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
            'category_name' => $category_name
        ]);
        Category::where('id', $category_id)->increment('subcategory_count', 1);
        return redirect()->route('allsubcategory')->with('message', 'Sub Category Added Successfully');
    }

    /* Edit Category */
    public function EditSubCategory($id)
    {
        $subcategory_info = Subcategory::findOrFail($id);
        $categories = Category::latest()->get();
        return view('admin.editsubcategory', compact(['subcategory_info', 'categories']));
    }



    public function UpdateSubCategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);

        $subcategory_id = $request->subcategory_id;
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        Subcategory::findOrFail($subcategory_id)->update([
            'subcategory_name' => $request->subcategory_name,
            'category_id' =>  $category_id,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
            'category_name' => $category_name
        ]);

        return redirect()->route('allsubcategory')->with('message', 'Sub Category Updated Successfully');
    }

    public function DeleteSubCategory($id)
    {
        $category_id = Subcategory::where('id', $id)->value('category_id');
        Subcategory::findOrfail($id)->delete();
        Category::where('id', $category_id)->decrement('subcategory_count', 1);
        return redirect()->route('allsubcategory')->with('message', 'Sub Category Deleted successfully!');
    }

}
