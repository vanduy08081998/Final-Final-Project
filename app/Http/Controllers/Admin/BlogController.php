<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddBlogRequest;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('permission:Thêm bài viết', ['only' => ['store']]);
        $this->middleware('permission:Sửa bài viết', ['only' => ['edit']]);
        $this->middleware('permission:Xóa bài viết', ['only' => ['destroy']]);
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.Blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCate = BlogCate::orderByDESC('id')->get();
        return view('admin.blog.Blog.create',[
            'blogCate' => $blogCate
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AddBlogRequest $validate)
    {
        Blog::create($request->all());
        return redirect()->route('blogs.index');
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
        $blog = Blog::find($id);
        $blogCate = BlogCate::orderByDESC('id')->get();
        return view('admin.blog.Blog.edit', compact('blog', 'blogCate'));
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
        Blog::find($id)->update($request->all());
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back();
    }

    public function BlogOn($id)
    {
        Blog::find($id)->update([
            'blog_status' => 1
        ]);
        return redirect()->route('blogs.index');
    }

    public function BlogOff($id)
    {
        Blog::find($id)->update([
            'blog_status' => 2
        ]);
        return redirect()->route('blogs.index');
    }

}
