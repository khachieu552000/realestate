<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function index(){
        return view('admin.slide.index');
    }

    public function create(){
        return view('admin.slide.add');
    }

    public function postCreate(Request $request){
        $this->validate($request, [
            'image_slide'=> 'required',
        ],[
            'image_slide.required' => 'Ảnh chưa được tải lên',
        ]);

        $slide = new Slide();
        $slide->name = $request->name;
        if($request->hasFile("image_slide")){
            $file = $request->file("image_slide");
            $name = $file->getClientOriginalName();
            $name_image = Str::random(5). "_". Str::random(5). "_" .$name;
            while(file_exists("images/slide/".$name_image)){
                $name_image = Str::random(5). "_". Str::random(5). "_" .$name;
            }
            $file -> move("images/slide/", $name_image);
            $slide-> image = "images/slide/".$name_image;
        }
        $slide->save();
        return redirect()->back()->with('message', 'Đã thêm mới slide');
    }
}
