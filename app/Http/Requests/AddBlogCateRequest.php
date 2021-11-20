<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBlogCateRequest extends FormRequest
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
            'blog_title' => 'required|unique:categories,category_name|max:300',
            'blog_description' => 'required|max:400',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'blog_content' => 'required',
            'blog_image' => 'required'
        ];
    }

    public function messages(){ // Thêm s ở đuôi, (Tưởng tự nhắc)
        return [
            'blog_title.required' => 'Tiêu đề không được để trống!',
            'blog_title.unique' => 'Tiêu đề đã tồn tại!',
            'blog_content.required' => 'Nội dung không được để trống!',
            'meta_title.required' => 'Mô tả không được để trống!',
            'meta_keywords.required' => 'Từ khóa không được để trống!',
            'blog_image.required' => 'Hình ảnh không được để trống!'
        ];
    }
}
