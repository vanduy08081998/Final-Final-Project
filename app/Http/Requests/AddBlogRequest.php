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
            'blog_title' => 'required',
            'blog_description' => 'required',
            'meta_keywords'=> 'required',
            'blog_content' => 'required',
            'blog_image' => 'required'
        ];
    }

    public function messages(){
        return [
            'blog_title' => 'Tiêu đề không được để trống',
            'blog_description' => 'Mô tả không được để trống',
            'meta_keywords' => 'Từ khóa không được để trống',
            'blog_content' => 'Nội dung không được để trống',
            'blog_image' => 'Hình ảnh không được để trống'
        ];
    }
}
