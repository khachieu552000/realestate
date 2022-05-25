<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileInformationRequest;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profileInformation(){
        return view('profile.profile-information');
    }

    public function updateProfileInformation(ProfileInformationRequest $request){
        $info = UserInfo::find(Auth::user()->user_info->id);
        $info->name = $request->name;
        $info->phone = $request->phone;
        $info->birthday = $request->birthday;
        $info->gender = $request->gender;
        $info->address = $request->address;
        $info->update();
        return redirect()->back()->with('message', 'Thông tin đã được cập nhật');
    }

    public function changePassword(){
        return view('profile.change-password');
    }

    public function passwordLevel2(){
        return view('profile.password-level2');
    }
}
