<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBlogRequest extends FormRequest
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
            'product_name' => 'required',
            'product_slug' => 'required',
            'product_image'=> 'required',
            'product_gallery' => 'required',
            'product_id_category' => 'required',
            'unit_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_id_category' => 'required',

        ];
    }

    public function messages(){ // Thêm s ở đuôi, (Tưởng tự nhắc)
        return [
            'blogCate_name.required' => 'Tên danh mục không được để trống',
            'blogCate_name.unique' => 'Tên danh mục đã tồn tại',
            'meta_desc.required' => 'Mô tả không được để trống',
            'meta_title.required' => 'Tiêu đề không được để trống',
            'meta_keywords.required' => 'Từ khóa không được để trống'
        ];
    }
}
