<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


class UpdateBrandRequest extends FormRequest
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
        $id = \Request::segments()[2];
        return [
            'brand_name' => ['required', Rule::unique('brands', 'brand_name')->ignore($id, 'id'), 'max:255'],
            'brand_slug'=> ['required', Rule::unique('brands', 'brand_slug')->ignore($id, 'id'), 'max:255'],
            'brand_image'=> 'nullable',
            'category_id'=> 'required',
            'meta_keywords'=> 'required',
            'meta_title'=> 'required',
            'meta_desc'=> 'required'

        ];
    }
    public function messages()
    {
        return [
            'brand_name.required'=> 'Vui lòng không bỏ trống tên thương hiệu! ',
            'brand_name.unique'=> 'Tên thương hiệu này đã tồn tại! ',
            'brand_slug.required'=> 'Vui lòng không bỏ trống slug thương hiệu! ',
            'brand_slug.unique'=> 'Slug thương hiệu này đã tồn tại! ',
            'category_id.required'=> 'Vui lòng không bỏ trống danh mục! ',
            'meta_keywords.required'=> 'Vui lòng không bỏ trống từ khóa! ',
            'meta_title.required'=> 'Vui lòng không bỏ trống tiêu đề! ',
            'meta_desc.required'=> 'Vui lòng không bỏ trống mô tả! ',
        ];
    }
}
