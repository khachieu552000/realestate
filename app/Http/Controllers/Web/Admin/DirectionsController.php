<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionsController extends Controller
{
    public function index(){
        $directions = Direction::orderBy('id', 'asc')->get();
        return view('admin.directions.index', compact('directions'));
    }

    public function showAddDirections(){
        return view('admin.directions.add');
    }

    public function addDirections(Request $request){
        $this->validate($request, [
            'name_directions' => 'required',
        ],[
            'name_directions.required' => 'Vui lòng nhập tên hướng',
        ]);

        $directions = new Direction();
        $directions->name = $request->name_directions;
        $directions->save();
        return redirect()->back()->with('message', 'Thêm hướng thành công');
    }

    public function showUpdateDirections($id_directions){
        $directions = Direction::find($id_directions);
        return view('admin.directions.update', compact('directions'));
    }

    public function updateDirections(Request $request, $id_directions){
        $this->validate($request, [
            'name_directions' => 'required',
        ],[
            'name_directions.required' => 'Vui lòng nhập tên hướng',
        ]);

        $directions = Direction::find($id_directions);
        $directions->name = $request->name_directions;
        $directions->save();
        return redirect()->route('list-directions')->with('message', 'Cập nhật hướng thành công');
    }

    public function deleteDirections($id_directions){
        $directions = Direction::find($id_directions);
        $directions->delete();
        return redirect()->back()->with('message', 'Đã xoá thành công');
    }
}
