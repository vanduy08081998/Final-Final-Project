<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Variant;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribute = Attribute::all();
        return view('admin.attributes.index',compact('attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Attribute::create($data);
        return back()->with('message','Thêm thuộc tính thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attribute::find($id);
        return view('admin.attributes.edit', compact('attribute'));
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
        $data = $request->all();
        $attribute = Attribute::find($id);
        $attribute->update($data);
        return back()->with('message','Cập nhật thuộc tính thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attribute::find($id)->delete();
        return back()->with('message','Xóa thuộc tính thành công');
    }
    public function variant($attri_slug){
        $attribute = Attribute::where('slug',$attri_slug)->first();
        $name = $attribute->name;
        $id = $attribute->id;
        $variants = $attribute->variants()->get();
        return view('admin.attributes.variant_attribute', compact('name','id','variants'));
    }

    public function list_variants(Request $request ){
        $id = $request->id;
        $attribute = Attribute::find($id);
        $variants = $attribute->variants()->get();
        echo $variants;
    }

    public function add_variants(Request $request){
         Variant::create([
             'attribute_id' => $request->attri_id,
             'name' => $request->name,
             'slug' => $request->slug
         ]);
    }

    public function delete_variants(Request $request){
        Variant::find($request->id)->delete();
    }

}
