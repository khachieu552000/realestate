<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostType;
use Illuminate\Http\Request;

class PostTypeController extends Controller
{
    public function index(){
        $post_type = PostType::orderBy('id', 'asc')->get();
        return view('admin.post-type.index', compact('post_type'));
    }

    public function showAddPostType(){
        return view('admin.post-type.add');
    }

    public function addPostType(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required',
        ],[
            'name.required' => 'Vui lòng nhập tên loại bài đăng',
            'price.required' => 'Vui lòng nhập giá',
        ]);

        $post_type = new PostType();
        $post_type->name = $request->name;
        $post_type->price = $request->price;
        $post_type->save();
        return redirect()->back()->with('message', 'Thêm mới loại tin thành công');
    }

    public function showUpdatePostType($id_post_type){
        $post_type = PostType::find($id_post_type);
        return view('admin.post-type.update', compact('post_type'));
    }

    public function updatePostType(Request $request, $id_post_type){
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required',
        ],[
            'name.required' => 'Vui lòng nhập tên loại bài đăng',
            'price.required' => 'Vui lòng nhập giá',
        ]);

        $post_type = PostType::find($id_post_type);
        $post_type->name = $request->name;
        $post_type->price = $request->price;
        $post_type->save();
        return redirect()->route('list-post-type')->with('message', 'Cập nhật loại tin thành công');
    }

    public function deletePostType($id_post_type){
        $property = Property::where('post_type_id', $id_post_type)->first();
        $post_type = PostType::find($id_post_type);
        if(!empty($id_post_type)){
            return redirect()->back()->with('error', 'Không thể xoá');
        }
        $post_type->delete();
        return redirect()->back()->with('message','Đã xoá thành công');
    }
}
