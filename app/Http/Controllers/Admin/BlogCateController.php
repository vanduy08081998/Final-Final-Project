<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddBlogCateRequest;


class BlogCateController extends Controller
{
    public function __construct(){
        $this->middleware('permission:Thêm danh mục bài viết', ['only' => ['store']]);
        $this->middleware('permission:Sửa danh mục bài viết', ['only' => ['edit']]);
        $this->middleware('permission:Xóa danh mục bài viết', ['only' => ['destroy']]);
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCate = BlogCate::orderByDESC('id')->get();
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
    public function store(Request $request, AddBlogCateRequest $validate)
    {
        BlogCate::create($request->all());
        return redirect()->route('blogCate.index');
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
        $blogCate = BlogCate::find($id);
        return view('admin.blog.blogCate.edit', compact('blogCate'));
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

        return redirect()->route('blogCate.index');
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

}
