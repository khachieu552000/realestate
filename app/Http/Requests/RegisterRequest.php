<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:account,email',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'password' => 'required|min:6',
        ];
    }

    /**
     * Customize message error
     *
     * @return array
     */

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'gender.required' => 'Vui lòng chọn giới tính',
            'birthday.required' => 'Vui lòng nhập ngày sinh',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Nhập sai định dạng. Yêu cầu nhập số',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vưi lòng nhập ít nhất 6 ký tự',
        ];
    }
}
