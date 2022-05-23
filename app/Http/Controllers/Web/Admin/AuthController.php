<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registration()
    {
        return view('user.registration');
    }

    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
        ]);

        $user = Account::where('email', $request->email)
            ->where('password', bcrypt($request->password))
            ->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('error', 'Email hoặc Password không chính xác');
        }
    }
}
