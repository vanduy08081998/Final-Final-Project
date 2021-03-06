<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBannerRequest extends FormRequest
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
            'banner_name' => ['required' , 'unique:banners' , 'max:225'],
            'banner_link' => ['required', 'max:225'],
            'banner_content' => ['required', 'unique:banners' , 'max:225'],
            'banner_type' => ['required'],
            'status' => ['required'],
            'banner_img' => 'required'
        ];
    }

    public function messages(){ // Thêm s ở đuôi, (Tưởng tự nhắc)
        return [
            'banner_name.required' => 'Banner không được để trống!',
            'banner_name.unique' => 'banner_name đã tồn tại!',
            'banner_link.required' => 'banner_link không được để trống!',
            'banner_link.required' => 'banner_content không được để trống!',
            'banner_type.required' => 'banner_type không được để trống!',
            'banner_img.required' => 'banner_img không được để trống!'
        ];
    }
}
