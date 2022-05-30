<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Provinces;
use App\Models\Street;
use App\Models\Ward;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * CRUD Provinces
     */

    public function listProvinces(){
        $provinces = Provinces::orderBy('id','asc')->get();
        return view('admin.location.provinces.index', compact('provinces'));
    }

    public function showAddProvinces(){
        return view('admin.location.provinces.add');
    }

    public function addProvinces(Request $request){
        $this->validate($request, [
            'name_provinces' => 'required',
        ],[
            'name_provinces.required' => 'Vui lòng nhập tên tỉnh/thành phố',
        ]);

        $provinces = new Provinces();
        $provinces->name = $request->name_provinces;
        $provinces->save();
        return redirect()->back()->with('message', 'Đã thêm mới tỉnh/thành phố');
    }

    public function showUpdateProvinces($id_provinces){
        $provinces = Provinces::find($id_provinces);
        return view('admin.location.provinces.update',compact('provinces'));
    }

    public function updateProvinces(Request $request, $id_provinces){
        $this->validate($request, [
            'name_provinces' => 'required',
        ],[
            'name_provinces.required' => 'Vui lòng nhập tên tỉnh/thành phố',
        ]);

        $provinces = Provinces::find($id_provinces);
        $provinces->name = $request->name_provinces;
        $provinces->save();
        return redirect()->route('list-provinces')->with('message', 'Đã cập nhật tỉnh/thành phố');
    }

    public function deleteProvinces($id_provinces){
        $provinces = Provinces::with('district.ward.street')->find($id_provinces);
        dd($provinces);
        foreach($provinces->district as $district){
            $district->delete();
            foreach($district->ward as $ward){
                $ward->delete();
                foreach($ward->street as $street){
                    $street->delete();
                }
            }
        }
        $provinces->delete();
        return redirect()->back()->with('message', 'Đã xoá tỉnh/thành phố');
    }

    /**
     * CRUD District
     */

    public function listDistrict(){
        $district = District::orderBy('id', 'asc')->get();
        return view('admin.location.district.index',compact('district'));
    }

    public function showAddDistrict(){
        $provinces = Provinces::all();
        return view('admin.location.district.add', compact('provinces'));
    }

    public function addDistrict(Request $request){
        $this->validate($request, [
            'provinces' => 'required',
            'name_district' => 'required',
        ],[
            'provinces.required' => 'Vui lòng chọn tỉnh/thành phố',
            'name_district.required' => 'Vui lòng nhập tên quận/huyện',
        ]);

        $district = new District();
        $district->provinces_id = $request->provinces;
        $district->name = $request->name_district;
        $district->save();
        return redirect()->back()->with('message', 'Đã thêm mới quận/huyện');
    }

    public function showUpdateDistrict($id_district){
        $district = District::find($id_district);
        $provinces = Provinces::all();
        return view('admin.location.district.update',compact('district','provinces'));
    }

    public function updateDistrict(Request $request, $id_district){
        $this->validate($request, [
            'provinces' => 'required',
            'name_district' => 'required',
        ],[
            'provinces.required' => 'Vui lòng chọn tỉnh/thành phố',
            'name_district.required' => 'Vui lòng nhập tên quận/huyện',
        ]);

        $district = District::find($id_district);
        $district->provinces_id = $request->provinces;
        $district->name = $request->name_district;
        $district->save();
        return redirect()->route('list-district')->with('message', 'Đã câp nhật quận/huyện');
    }

    public function deleteDistrict($id_district){
        $district = District::with('ward.street')->find($id_district);\
        dd($district->ward);
        foreach($district->ward as $ward){
            $ward->delete();
            foreach($ward->street as $street){
                $street->delete();
            }
        }
        $district->delete();
        return redirect()->back()->with('message', 'Đã xoá quận/huyên');
    }

    /**
     * CRUD Ward
     */

    public function listWard(){
        $ward = Ward::orderBy('id','asc')->get();
        return view('admin.location.ward.index', compact('ward'));
    }

    public function showAddWard(){
        $district = District::all();
        return view('admin.location.ward.add',compact('district'));
    }

    public function addWard(Request $request){
        $this->validate($request, [
            'district' => 'required',
            'name_ward' => 'required',
        ],[
            'district.required' => 'Vui lòng chọn quận/huyện',
            'name_ward.required' => 'Vui lòng nhập tên phường/xã',
        ]);

        $ward = new Ward();
        $ward->district_id = $request->district;
        $ward->name = $request->name_ward;
        $ward->save();
        return redirect()->back()->with('message', 'Đã thêm mới phường/xã');
    }

    public function showUpdateWard($id_ward){
        $ward = Ward::find($id_ward);
        $district = District::all();
        return view('admin.location.ward.update', compact('ward', 'district'));
    }

    public function updateWard(Request $request, $id_ward){
        $this->validate($request, [
            'district' => 'required',
            'name_ward' => 'required',
        ],[
            'district.required' => 'Vui lòng chọn quận/huyện',
            'name_ward.required' => 'Vui lòng nhập tên phường/xã',
        ]);

        $ward = Ward::find($id_ward);
        $ward->district_id = $request->district;
        $ward->name = $request->name_ward;
        $ward->save();
        return redirect()->route('list-ward')->with('message', 'Đã cập nhật phường/xã');
    }

    public function deleteWard($id_ward){
        $ward = Ward::with('street')->find($id_ward);
        foreach($ward->street as $street){
            $street->delete();
        }
        $ward->delete();
        return redirect()->back()->with('message', 'Đã xoá phường/xã');
    }

    /**
     * CRUD Street
     */

    public function listStreet(){
        $street = Street::orderBy('id','asc')->get();
        return view('admin.location.street.index', compact('street'));
    }

    public function showAddStreet(){
        $ward = Ward::all();
        return view('admin.location.street.add', compact('ward'));
    }

    public function addStreet(Request $request){
        $this->validate($request, [
            'ward' => 'required',
            'name_street' => 'required',
        ],[
            'ward.required' => 'Vui lòng chọn phường/xã',
            'name_street.required' => 'Vui lòng nhập tên đường/phố',
        ]);

        $street = new Street();
        $street->ward_id = $request->ward;
        $street->name = $request->name_street;
        $street->save();
        return redirect()->back()->with('message', 'Đã thêm đường/phố');
    }

    public function showUpdateStreet($id_street){
        $ward = Ward::all();
        $street = Street::find($id_street);
        return view('admin.location.street.update', compact('ward', 'street'));
    }

    public function updateStreet(Request $request, $id_street){
        $this->validate($request, [
            'ward' => 'required',
            'name_street' => 'required',
        ],[
            'ward.required' => 'Vui lòng chọn phường/xã',
            'name_street.required' => 'Vui lòng nhập tên đường/phố',
        ]);

        $street = Street::find($id_street);
        $street->ward_id = $request->ward;
        $street->name = $request->name_street;
        $street->save();
        return redirect()->route('list-street')->with('message', 'Đã cập nhật đường/phố');
    }

    public function deleteStreet($id_street){
        $street = Street::find($id_street);
        $street->delete();
        return redirect()->back()->with('message', 'Đã xoá đường/phố');
    }

    public function listDetail(){
        $location = Provinces::with('district.ward')->get();
        return view('admin.location.list-detail',compact('location'));
    }

}
