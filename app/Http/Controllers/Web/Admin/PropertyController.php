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
use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PropertyController extends Controller
{
    use UploadFileTrait;
    const ACTIVE_PROPERTY = 'active';
    const END_PROPERTY = 'end';
    const LOCK_STATUS = 1;

    public function index(){
        $property = Property::orderBy('id','asc')->get();
        // dd(Session('id'));
        if(Session('login')){
        $property_user = Property::where('account_id', Session('id'))->get();
        }
        else if(Auth::user()){
            $property_user = Property::where('account_id', Auth::user()->id)->get();
        }
        // dd($property_user);
        // dd($property_user);
        return view('admin.property.index', compact('property', 'property_user'));
    }

    public function showAddProperty(){
        $provinces = Provinces::all();
        $directions = Direction::all();
        $post_type = PostType::all();
        $category = Category::all();
        $property_type = PropertyType::all();
        $property_type_user = PropertyType::where('status', '!=',self::LOCK_STATUS)->get();
        return view('admin.property.add', compact('provinces', 'directions', 'post_type', 'category', 'property_type', 'property_type_user'));
    }


    public function addProperty(PropertyRequest $request){
        $property = new Property();
        $property->account_id = Auth::user()->id?Auth::user()->id:session('user_name');
        $property->categories_id = $request->category;
        $property->property_type_id	 = $request->property_type;
        $property->investor = $request->investor;
        $property->name = $request->name;
        $property->price = $request->price;
        $property->floors = $request->floors;
        $property->acreage = $request->acreage;
        $property->juridical = $request->juridical;
        $property->street_id = $request->street;
        $property->address = $request->address;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->direction_id = $request->direction;
        $property->post_type_id = $request->post_type;
        $property->start_date = $request->start_date;
        $property->end_date = $request->end_date;
        $property->description = $request->description;
        $image = $property;
        $path = "images/property/";
        $this->upload($image, $request, $path);
        $property->save();
        return redirect()->back()->with('message', 'Thêm thành công');
    }

    public function showUpdateProperty($id_property){
        $property = Property::find($id_property);
        $provinces = Provinces::all();
        $directions = Direction::all();
        $post_type = PostType::all();
        $category = Category::all();
        $street = Street::all();
        $property_type = PropertyType::all();
        $property_type_user = PropertyType::where('status', '!=',self::LOCK_STATUS)->get();
        return view('admin.property.update',compact('property','provinces','directions','post_type','category','property_type','street','property_type_user'));
    }

    public function updateProperty(PropertyRequest $request, $id_property){
        $property = Property::find($id_property);
        $property->account_id = Auth::user()->id?Auth::user()->id:session('user_name');
        $property->categories_id = $request->category;
        $property->property_type_id	 = $request->property_type;
        $property->investor = $request->investor;
        $property->name = $request->name;
        $property->price = $request->price;
        $property->floors = $request->floors;
        $property->acreage = $request->acreage;
        $property->juridical = $request->juridical;
        $property->street_id = $request->street;
        $property->address = $request->address;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->direction_id = $request->direction;
        $property->post_type_id = $request->post_type;
        $property->start_date = $request->start_date;
        $property->end_date = $request->end_date;
        $property->description = $request->description;
        $image = $property;
        $path = "images/property/";
        $this->upload($image, $request, $path);
        $property->save();
        return redirect()->route('list-property')->with('message', 'Cập nhật thành công');
    }

    public function delete($id_property){
        $property = Property::find($id_property);
        $property->delete();
        return redirect()->back()->with('message', 'Xoá thành công');
    }

    public function activeProperty($id_property){
        $property = Property::find($id_property);
        $property->status = self::ACTIVE_PROPERTY;
        $property->save();
        return redirect()->back()->with('message', 'Đã duyệt bài đăng');
    }

    public function endProperty($id_property){
        $property = Property::find($id_property);
        $property->status = self::END_PROPERTY;
        $property->save();
        return redirect()->back()->with('message', 'Đã cập nhật trạng thái dự án');
    }
}
