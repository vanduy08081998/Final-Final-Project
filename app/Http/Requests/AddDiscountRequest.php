<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDiscountRequest extends FormRequest
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
            'discount_code' => ['required', 'unique:discount','min:6','max:12'], 
            'discount_deduct' => ['required', 'numeric', 'min:1', 'max:999999'], 
            'discount_start' => ['required', 'after_or_equal:today'], 
            'discount_end'=> ['required','after:discount_start'],
            'discount_title'=> ['required', 'min:15'], 
            'discount_limit'=> ['required', 'numeric'], 
            'discount_feature'=> ['required'],
        ];
    }

    public function messages()
    {
        return [
            'discount_code.required'=> 'Vui lòng không bỏ trống mã code! ',
            'discount_code.unique'=> 'Mã này đã tồn tại! ',
            'discount_code.min'=> 'Trên 6 ký tự! ',
            'discount_code.max'=> 'Không quá 12 ký tự! ',
            'discount_deduct.max'=> 'Số tiền giảm giá quá lớn',
            'discount_title.min'=> 'Tiêu đề quá ngắn',
            'discount_end.after'=> 'Ngày kết thúc phải sau ngày bắt đầu!',
            'discount_start.after_or_equal'=> 'Ngày bắt đầu không hợp lệ!',
            'discount_limit.numeric'=> 'Giá trị phải là số!',
            'discount_deduct.numeric' => 'Giá trị phải là số!',
        ];
    }
}