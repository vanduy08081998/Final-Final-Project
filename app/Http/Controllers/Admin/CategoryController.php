<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('permission:Thêm danh mục', ['only' => ['store']]);
        $this->middleware('permission:Sửa danh mục', ['only' => ['edit']]);
        $this->middleware('permission:Xóa danh mục', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('category_parent_id', null)->orderBy('id_cate', 'desc')->get();
        return view('admin.Categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AddCategoryRequest $validate)
    {

        Category::create($request->all());
        return back();
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
        $category = Category::find($id);
        return view('admin.Categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, UpdateCategoryRequest $validate)
    {
        Category::find($id)->update($request->all());

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
        Category::find($id)->delete();
        return redirect()->back()->with('message', 'Xóa danh mục thành công');
    }

    public function detach_brand($brand_id, $cate_id)
    {
        $cateId = Category::find($cate_id);
        $cateId->brands()->detach($brand_id);
        return back()->with('message', 'Xóa liên kết thương hiệu thành công');

    }

    //ATTRIBUTE CATEGORY
    public function attribute($id)
    {
        $cateId = Category::find($id);
        $cate_name = $cateId->category_name;
        $attributeAll = Attribute::get();
        $attributes = $cateId->attributes()->get();
        $attr_arr = $attributes->pluck('id')->all();
        return view('admin.attributes.category_attribute', compact('attributes', 'attributeAll', 'cate_name', 'id', 'attr_arr'));
    }

    public function detach_cate_attr($attr_id, $cate_id)
    {
        $cateId = Category::find($cate_id);
        $cateId->attributes()->detach($attr_id);
        return back()->with('message', 'Xóa liên kết thuộc tính thành công');
    }

    public function add_attr_category($id, Request $request)
    {
        $cate_id = Category::find($id);
        $cate_id->attributes()->sync($request->attribute_id);
        return back()->with('message', 'Thêm thuộc tính thành công');
    }

}