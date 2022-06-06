<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Models\Street;
use App\Models\Ward;
use App\Models\District;

class SelectLocationController extends Controller
{
    public function selectLocation(Request $request){
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
}
