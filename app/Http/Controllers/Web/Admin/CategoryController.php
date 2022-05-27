<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::getData($parent_id = 1)->get();
        return view('admin.category.index', compact('category'));
    }

    public function showAddCategory()
    {
        $parent = Category::where('parent_id', 0)->get();
        return view('admin.category.add', compact('parent'));
    }

    public function addCategory(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->back()->with('message', 'Thêm danh mục thành công');
    }

    public function showUpdateCategory($id_category)
    {
        $category = Category::find($id_category);
        $parent = Category::where('parent_id', 0)->get();
        return view('admin.category.update', compact('category', 'parent'));
    }

    public function updateCategory(CategoryRequest $request, $id_category)
    {
        $category = Category::find($id_category);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->back()->with('message', 'Thông tin danh mục đã được cập nhật');
    }

    public function delete($id_category)
    {
        Category::destroy($id_category);
        return redirect()->back()->with('message', 'Đã xoá danh mục');
    }
}
