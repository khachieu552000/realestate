<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::orderBy('id', 'asc')->get();
        return view('admin.category.index', compact('category'));
    }

    public function addCategory(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('message', 'Thêm danh mục thành công');
    }

    public function showUpdateCategory($id_category)
    {
        $category = Category::find($id_category);
        return response()->json(['data'=>$category],200);
    }

    public function updateCategory(CategoryRequest $request, $id_category)
    {
        $category = Category::find($id_category);
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('message', 'Thông tin danh mục đã được cập nhật');
    }

    public function delete($id_category)
    {
        $property = Property::where('categories_id', $id_category)->first();
        if(!empty($property)){
            return redirect()->back()->with('error','Danh mục có tồn tại bất động sản. Không thể xoá');
        }
        Category::destroy($id_category);
        return redirect()->back()->with('message', 'Đã xoá danh mục');
    }
}
