<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required',
            'images' => 'required',
            'content' => 'required',
        ];
    }

    /**
     * customize message error
     *
     * @return array
     */

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'images.required' => 'Ảnh chưa được tải lên',
            'content.required' => 'Nội dung không được để trống',
        ];
    }
}
