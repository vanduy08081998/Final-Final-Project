<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddInforRequest extends FormRequest
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
            'start_time' => 'required',
            'end_time' => 'required',
            'address'=> 'required',
            'phone' => 'required',
            'email' => 'required',
            'gg_map' => 'required'
        ];
    }

    public function messages(){
        return [
            'start_time.required' => 'Thời gian bắt đầu không để trống',
            'end_time.required' => 'Thời gian kết thúc không để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
            'gg_map.required' => 'IP gg map không được để trống'
        ];
    }
}
