<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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

    /**ignore() ngoại lê
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         $id = \Request::segments()[2];
        return [
            'banner_name' => ['required' , Rule::unique('banners', 'banner_name')->ignore($id, 'id'), 'max:225'],
            'banner_link' => ['required', Rule::unique('banners', 'banner_link')->ignore($id, 'id'), 'max:225'],
            'banner_content' => ['required','max:225'],

        ];
    }

    public function messages(){ // Thêm s ở đuôi, (Tưởng tự nhắc)
        return [
            'banner_name.required' => 'Banner không được để trống!',
            'banner_name.unique' => 'banner_name đã tồn tại!',
            'banner_link.required' => 'banner_link không được để trống!',
            'banner_link.unique' => 'banner_link đã tồn tại!',
            'banner_content.required' => 'banner_content không được để trống!',

        ];
    }
}