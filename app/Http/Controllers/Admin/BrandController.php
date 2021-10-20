<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\CategoryBrand;
use App\Services\GeneralService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $generalService, $path;

    public function __construct(GeneralService $generalService)
    {
        $this->path = 'public/uploads/brand/';
        $this->generalService = $generalService;
    }

    public function index()
    {
        $brandAll = Brand::with('categories')->orderByDESC('id')->get();
        return view('admin.brand.index', compact('brandAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBrandRequest $request)
    {
        $data = $request->validated();
        $data['brand_image'] = $this->generalService->uploadImage($this->path ,$request->brand_image);
        $brand = Brand::create($data);
        $brand->categories()->attach($data['category_id']);
        return back()->with('message','Thêm thương hiệu thành công');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
        $brandId = Brand::find($id);
        return view('admin.brand.edit', compact('brandId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $brandId = Brand::find($id);
        $data = $request->validated();
        if($request->brand_image){
           $data['brand_image'] = $this->generalService->uploadImage($this->path, $request->brand_image);
           // Xóa hình ảnh cũ
           $this->generalService->deleteImage($this->path, $brandId->brand_image);
        }
        $brandId->categories()->sync($data['category_id']);
        $brandId->update($data);
        return back()->with('message', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brandId = Brand::find($id);
        $this->generalService->deleteImage($this->path, $brandId->brand_image);
        $brandId->delete();
        return back()->with('message', 'Xóa dữ liệu thành công');
    }
}