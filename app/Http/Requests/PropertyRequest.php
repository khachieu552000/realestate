<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'category' => 'required',
            'property_type' => 'required',
            'name' => 'required',
            'street' => 'required',
            'price' => 'required|numeric|min:1',
            'acreage' => 'required|numeric|min:1',
            'juridical' => 'required',
            'description' => 'required',
            'direction' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            // 'floors' => 'numeric|min:0',
            // 'bedrooms' => 'numeric|min:0',
            // 'bathrooms' => 'numeric|min:0',
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
            'category.required' => 'Bạn chưa chọn danh mục',
            'property_type.required' => 'Bạn chưa chọn loại hình bất động sản',
            'name.required' => 'Bạn chưa nhập tên',
            'street.required' => 'Bạn chưa chọn đường/phố',
            'price.required' => 'Bạn chưa nhập giá',
            'price.numeric' => 'Nhập ký tự không hợp lệ',
            'price.min' => 'Nhập giá phải không âm',
            'acreage.required' => 'Bạn chưa nhập diện tích',
            'acreage.numeric' => 'Nhập ký tự không hợp lệ',
            'acreage.min' => 'Nhập diện tích phải không âm',
            'juridical.required' => 'Bạn chưa nhập giấy tờ pháp lý',
            'description.required' => 'Bạn chưa nhập mô tả',
            'direction.required' => 'Bạn chưa chọn hướng',
            'start_date.required' => 'Bạn chưa nhập ngày bắt đầu',
            'end_date.required' => 'Bạn chưa nhập ngày kết thúc',
            // 'floors.numeric' => 'Nhập số tầng không hợp lệ',
            // 'floors.min' => 'Nhập số tầng phải không âm',
            // 'bedrooms.numeric' => 'Nhập số phòng ngủ không hợp lệ',
            // 'bedrooms.min' => 'Số lượng phòng ngủ không được âm',
            // 'bathrooms.numeric' => 'Nhập số phòng tắm không hợp lệ',
            // 'bathrooms.min' => 'Số lượng phòng tắm không được âm',
        ];
    }
}
