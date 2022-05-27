<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'parent_id' => 'required',
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
            'name.required' => 'Tên danh mục không được để trống',
            'parent_id.required' => 'Chưa chọn loại danh mục',
        ];
    }
}
