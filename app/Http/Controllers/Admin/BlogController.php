<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCate;

class BlogController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCate = BlogCate::where('Blog_parent_id', NULL)->orderBy('id', 'desc')->get();
        return view('admin.blog.blogCate.index', compact('blogCate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.blogCate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BlogCate::create($request->all());
        return redirect()->route('blog.blogCate.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Blog = BlogCate::find($id);
        return view('admin.blog.blogCate.edit', compact('Blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        BlogCate::find($id)->update($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCate::find($id)->delete();
        return redirect()->back();
    }

    public function detach_brand($brand_id, $cate_id){
       $cateId = BlogCate::find($cate_id);
       $cateId->brands()->detach($brand_id);
       return back()->with('message','Xóa liên kết thương hiệu thành công');

    }

    public function detach_cate_attr($attr_id, $cate_id){
        $cateId = BlogCate::find($cate_id);
        $cateId->attributes()->detach($attr_id);
       return back()->with('message','Xóa liên kết thuộc tính thành công');
    }

    public function add_attr_Blog($id, Request $request){
       $cate_id = BlogCate::find($id);
       $cate_id->attributes()->sync($request->attribute_id);
       return back()->with('message', 'Thêm thuộc tính thành công');
    }
}
