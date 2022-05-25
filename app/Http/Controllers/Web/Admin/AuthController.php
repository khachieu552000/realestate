<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Str;
use Socialite;
use App\Models\AccSocial;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function registerMail(RegisterRequest $request)
    {
        $register_token = Str::random(10);
        $data = $request->all();
        $password_h = bcrypt($request->password);
        $data['password'] = $password_h;
        $data['register_token'] = $register_token;

        if ($data > 0) {
            Account::register($data);
            Mail::send('user.active-account', compact('data'), function ($email) use ($data) {
                $email->subject('RealEstate');
                $email->to($data['email'], $data['name']);
            });
        }
        return redirect()->back()->with('message', 'Đăng ký thành công.
        Vui lòng kiểm tra email và làm theo hướng dẫn để hoàn thành việc đăng ký tài khoản của bạn.');
    }


    public function verifyRegisterMail($mail_user, $token)
    {
        $account = Account::where('email', $mail_user)->first();
        if ($account->register_token === $token) {
            $account->status = 'active';
            $account->update();
            return redirect()->route('login')->with('message', 'Xác nhận tài khoản thành công, bạn có thể đăng nhập vào hệ thống');
        } else {
            return redirect()->route('login')->with('error', 'Mã xác nhận không hợp lệ');
        }
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

        $remember = $request->has('remember') ? True : False;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'], $remember)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('login_error', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $users = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateUser($users, 'google');
        if($authUser){
            $this->sessionProfile($authUser);
        }
        elseif($account_user_new){
            $this->sessionProfile($authUser);
        }
        return redirect()->route('admin.index')->with('message', 'Đăng nhập thành công');
    }

    public function findOrCreateUser($users, $provider)
    {
        $authUser = AccSocial::where('provider_user_id', $users->id)->first();
        if ($authUser) {
            return $authUser;
        }
        else{
            $account_user_new = new AccSocial([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);

            $orang = Account::where('email', $users->email)->first();

            if (!$orang) {
                $orang = Account::create([
                    'email' => $users->email,
                    'password' => '',
                    'role' => 'user',
                    'status' => 'active',
                ]);
                $user_info = UserInfo::create([
                    'account_id' => $orang->id,
                    'name' => $users->name,
                    'gender' => ' ',
                    // 'birthday' => '',
                    'address' => ' ',
                    'phone' => ' ',
                ]);
            }
            $account_user_new->account()->associate($orang, $user_info);
            $account_user_new->save();
            return $account_user_new;
        }

    }

    public function sessionProfile($authUser){
        $account_name = Account::with('user_info')->where('id', $authUser->account_id)->first();
        Session::put('user_name', $account_name->user_info->name);
        Session::put('phone', $account_name->user_info->phone);
        Session::put('email', $account_name->email);
        Session::put('address', $account_name->user_info->address);
        Session::put('date', $account_name->user_info->birthday);
        Session::put('login', true);
        Session::put('id', $account_name->id);
        Session::put('role', $account_name->role);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }
}
