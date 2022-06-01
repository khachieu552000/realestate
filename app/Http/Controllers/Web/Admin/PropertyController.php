<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Direction;
use App\Models\District;
use App\Models\PostType;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Provinces;
use App\Models\Street;
use App\Models\Ward;
use Illuminate\Http\Request;
use PhpOption\Option;
use App\Http\Controllers\Web\Admin\UploadFileTrait;
use Illuminate\Support\Facades\Log;

class PropertyController extends Controller
{
    use UploadFileTrait;
    public function index(){
        return view('admin.property.index');
    }

    public function selectDelivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="provinces"){
                $select_district = District::where('provinces_id',$data['id'])->get();
                $output .= '<option>--Chọn quận huyện--</option>';
                foreach($select_district as $district){
                $output .='<option value="'.$district->id.'">'.$district->name.'</option>';
                }
            } else if($data['action']=="district"){
                $select_ward = Ward::where('district_id',$data['id'])->get();
                $output .= '<option>--Chọn xã phường--</option>';
                foreach($select_ward as $ward){
                $output .='<option value="'.$ward->id.'">'.$ward->name.'</option>';
                }
            }
            else {
                $select_street = Street::where('ward_id',$data['id'])->get();
                $output .= '<option>--Chọn đường phố--</option>';
                foreach($select_street as $street){
                $output .='<option value="'.$street->id.'">'.$street->name.'</option>';
                }
            }
        }
        echo $output;
    }

    public function showAddProperty(){
        $provinces = Provinces::all();
        $directions = Direction::all();
        $post_type = PostType::all();
        $category = Category::all();
        $property_type = PropertyType::all();
        return view('admin.property.add', compact('provinces', 'directions', 'post_type', 'category', 'property_type'));
    }

    /**
     * In progress
     */

    // public function addProperty(Request $request){
    //     $this->validate($request, [
    //         'category' => 'required',
    //         'property_type' => 'required',
    //         'investor' => 'required',
    //         'name' => 'required',
    //         'provinces' => 'required',
    //         'district' => 'required',
    //         'ward' => 'required',
    //         'street' => 'required',
    //         'start_date' => 'required',
    //         'end_date' => 'required',
    //         'images' => 'required',
    //     ]);
    //     $property = new Property();
    //     $property->categories_id = $request->category;
    //     $property->property_type_id	 = $request->property_type;
    //     $property->investor = $request->investor;
    //     $property->name = $request->name;
    //     $property->price = $request->price?$request->price:'';
    //     $property->floors = $request->floors?$request->floors:'';
    //     $property->acreage = $request->acreage?$request->acreage:'';
    //     $property->juridical = $request->juridical?$request->juridical:'';
    //     // $property->provinces = $request->provinces;
    //     // $property->district = $request->district;
    //     // $property->ward = $request->ward;
    //     $property->street = $request->street_id;
    //     $property->address = $request->address?$request->address:'';
    //     $property->bedrooms = $request->bedrooms?$request->bedrooms:'';
    //     $property->bathrooms = $request->bathrooms?$request->bathrooms:'';
    //     $property->post_type_id = $request->post_type?$request->post_type:'';
    //     $property->start_date = $request->start_date;
    //     $property->end_date = $request->end_date;
    //     $property->description = $request->description?$request->description:'';
    //     $image = $property;
    //     $path = "images/property/";
    //     $this->upload($image, $request, $path);
    //     $property->save();
    //     return redirect()->back()->with('message', 'Thêm thành công');
    //     Log::info($property);
    // }
}
