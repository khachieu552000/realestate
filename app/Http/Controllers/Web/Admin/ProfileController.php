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
use Nette\Utils\Random;
use Illuminate\Support\Facades\Mail;
use Str;

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
        ], [
            'email.required' => 'Email không được để trống',
        ]);
        $account = Account::where('email', $request->email)->first();
        if ($account === null) {
            return redirect()->back()->with('error', 'Email chưa được đăng ký');
        } else {
            $data = $request->all();
            $title = "Mã OTP";
            $reset_token = random_int(1000000, 10000000);
            $account->user_token = $reset_token;
            $account->update();
            $data['reset_token'] = $reset_token;
            Mail::send('profile.mail-reset-password', compact('data'), function ($email) use ($title, $data) {
                $email->subject($title);
                $email->to($data['email'], $title);
            });
            return redirect()->route('new-password');
        }
    }

    public function newPassword(Request $request)
    {
        return view('profile.new-password');
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'otp' => 'required',
            'password_level_2' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ], [
            'otp.required' => 'Bạn chưa nhập mã otp',
            'password_level_2.required' => 'Bạn chưa nhập mật khẩu cấp 2',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'confirm_password.required' => 'Vui lòng xác nhận mật khẩu',
            'confirm_password.same' => 'Xác nhận mật khẩu không chính xác',
        ]);

        $account_reset_password = Account::where('user_token', $request->otp)->first();
        if ($account_reset_password === null) {
            return redirect()->back()->with('error', 'Mã otp không hợp lệ');
        } else {
            if (!(Hash::check($request->password_level_2, $account_reset_password->password_level_2))) {
                return redirect()->back()->with('error', 'Mật khẩu cấp 2 không chính xác');
            } else {
                $account_reset_password->password = bcrypt($request->password);
                $account_reset_password->update();
                return redirect()->route('login')->with('message', 'Khôi phục mật khẩu thành công. Mời bạn đăng nhập');
            }
        }
    }
}
