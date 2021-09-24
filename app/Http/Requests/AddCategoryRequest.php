<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'category_name' => 'required|unique:categories,category_name|max:225',
            'meta_desc' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required'
        ];
    }

    public function messages(){ // Thêm s ở đuôi, (Tưởng tự nhắc)
        return [
            'category_name.required' => 'Tên danh mục không được để trống',
            'category_name.unique' => 'Tên danh mục đã tồn tại',
            'meta_desc.required' => 'Mô tả không được để trống',
            'meta_title.required' => 'Tiêu đề không được để trống',
            'meta_keywords.required' => 'Từ khóa không được để trống'
        ];
    }
}
