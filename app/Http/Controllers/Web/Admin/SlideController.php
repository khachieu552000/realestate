<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// trait
use App\Http\Controllers\Web\Admin\UploadFileTrait;

class SlideController extends Controller
{
    use UploadFileTrait;
    public function index()
    {
        $slide = Slide::orderBy('id', 'asc')->get();
        return view('admin.slide.index', compact('slide'));
    }

    public function showAddSlide()
    {
        return view('admin.slide.add');
    }

    public function addSlide(Request $request)
    {
        $this->validate($request, [
            'images' => 'required',
        ], [
            'images.required' => 'Ảnh chưa được tải lên',
        ]);

        $slide = new Slide();
        $slide->name = $request->name;
        $image = $slide;
        $path = "images/slide/";
        $this->upload($image, $request, $path);
        $slide->save();
        return redirect()->back()->with('message', 'Đã thêm mới slide');
    }

    public function delete($id_slide)
    {
        $slide = Slide::find($id_slide);
        $destinationPath = $slide->image;
        if (file_exists($destinationPath)) {
            unlink($destinationPath);
        }
        $slide->delete();
        return redirect()->back()->with('message', 'Đã xoá slide');
    }
}
