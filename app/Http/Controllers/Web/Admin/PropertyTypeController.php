<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index(){
        $property_type = PropertyType::orderBy('id','asc')->get();
        return view('admin.property-type.index', compact('property_type'));
    }

    public function addPropertyType(Request $request)
    {
        $property_type = new PropertyType();
        $property_type->name = $request->name;
        $property_type->save();
        return redirect()->back()->with('message', 'Thêm loại hình thành công');
    }

    public function showUpdatePropertyType($id_property_type)
    {
        $property_type = PropertyType::find($id_property_type);
        return response()->json(['data'=>$property_type],200);
    }

    public function updatePropertyType(Request $request, $id_property_type)
    {
        $property_type = PropertyType::find($id_property_type);
        $property_type->name = $request->name;
        $property_type->save();
        return redirect()->back()->with('message', 'Thông tin loại hình đã được cập nhật');
    }

    public function delete($id_property_type)
    {
        $property = Property::where('property_type_id', $id_property_type)->first();
        if(!isset($property)){
            return redirect()->back()->with('error', 'Không thể xoá loại hình');
        }
        PropertyType::destroy($id_property_type);
        return redirect()->back()->with('message', 'Đã xoá loại hình');
    }

    public function lockStatus($id_property_type){
        $property_type = PropertyType::find($id_property_type);
        $property_type->status = 1;
        $property_type->update();
        return redirect()->back()->with('message', 'Đã khoá loại hình bất động sản');
    }
}
