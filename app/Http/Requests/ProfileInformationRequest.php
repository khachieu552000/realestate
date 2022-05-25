<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileInformationRequest extends FormRequest
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
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
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
            'gender.required' => 'Vui lòng chọn giới tính',
            'birthday.required' => 'Vui lòng nhập ngày sinh',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Nhập sai định dạng. Yêu cầu nhập số',

        ];
    }
}
