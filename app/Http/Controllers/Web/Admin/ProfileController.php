<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileInformationRequest;
use App\Models\Account;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileInformation()
    {
        return view('profile.profile-information');
    }

    public function updateProfileInformation(ProfileInformationRequest $request)
    {
        $info = UserInfo::find(Auth::user()->user_info->id);
        $info->name = $request->name;
        $info->phone = $request->phone;
        $info->birthday = $request->birthday;
        $info->gender = $request->gender;
        $info->address = $request->address;
        $info->update();
        return redirect()->back()->with('message', 'Thông tin đã được cập nhật');
    }

    public function passwordLevel2()
    {
        return view('profile.password-level2');
    }

    public function setPasswordLevel2(PasswordRequest $request)
    {
        $account = Account::find(Auth::user()->id);
        $account->password_level_2 = bcrypt($request->password);
        $account->save();
        return redirect()->back()->with('message', 'Đặt mật khẩu cấp 2 thành công');
    }

    public function changePassword()
    {
        return view('profile.change-password');
    }

    public function changePasswordLevel1(PasswordRequest $request)
    {
        $account = Auth::user();
        if (!(Hash::check($request->old_password, $account->password))) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không chính xác');
        } elseif (strcmp($request->old_password, $request->password) === 0) {
            return redirect()->back()->with('error', 'Mật khẩu mới trùng với mật khẩu cũ');
        }
        $account->password = bcrypt($request->password);
        $account->update();
        return redirect()->back()->with('message', 'Mật khẩu cấp 1 đã được thay đổi');
    }

    public function changePasswordLevel2(PasswordRequest $request)
    {
        $account = Auth::user();
        if (!(Hash::check($request->old_password, $account->password_level_2))) {
            return redirect()->back()->with('error_level2', 'Mật khẩu cũ không chính xác');
        } elseif (strcmp($request->old_password, $request->password) === 0) {
            return redirect()->back()->with('error_level2', 'Mật khẩu mới trùng với mật khẩu cũ');
        }
        $account->password_level_2 = bcrypt($request->password);
        $account->update();
        return redirect()->back()->with('message_level2', 'Mật khẩu cấp 2 đã được thay đổi');
    }

    public function forgotPassword(Request $request)
    {
        return view('profile.forgot-password');
    }

    public function checkPasswordLevel2(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password_level_2' => 'required',
        ], [
            'email.required' => 'Email không được để trống',
            'password_level_2.required' => 'Mật khẩu cấp 2 không được để trống',
        ]);
        $account = Account::where('email', $request->email)->first();
        if ($account === null) {
            return redirect()->back()->with('error', 'Email chưa được đăng ký');
        } else {
            if (Hash::check($request->password_level_2, $account->password_level_2)) {
                return redirect()->route('new-password', ['account' => $account]);
            } else {
                return redirect()->back()->with('error', 'Mật khẩu cấp 2 bạn nhập không chính xác');
            }
        }
    }

    public function newPassword(Request $request)
    {
        dd($request->account);
        return view('profile.new-password');
    }

    public function resetPassword(Request $request)
    {
        dd($request->account);
        $account_reset_password = Account::find($request->account);
        // dd($request->password);
        $account_reset_password->password = bcrypt($request->password);
        $account_reset_password->update();
        return redirect()->route('login')->with('Khôi phục mật khẩu thành công. Mời bạn đăng nhập');
    }
}
