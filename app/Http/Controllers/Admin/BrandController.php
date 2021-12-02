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
        $this->path = 'uploads/Brands/';
        $this->generalService = $generalService;
    }

    public function index()
    {
        $brandAll = Brand::with('categories')->orderByDESC('id')->get();
        $countTrashed = Brand::onlyTrashed()->count();
        return view('admin.brand.index', compact('brandAll', 'countTrashed'));
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
        Brand::find($id)->delete();
        return back()->with('message', 'Xóa dữ liệu thành công');
    }

    public function trash(){
        $brandAll = Brand::onlyTrashed()->get();
        return view('admin.brand.trash', compact('brandAll'));
    }

    public function restore($id){
        Brand::where('id', $id)->restore();
        return back()->with('message', 'Đã khôi phục dữ liệu');
    }

    public function forceDelete($id){
        $brandId = Brand::withTrashed()->find($id);
        $this->generalService->deleteImage($this->path, $brandId->brand_image);
        $brandId->forceDelete();
        return back()->with('message', 'Xóa dữ liệu thành công');
    }

    public function handle(Request $request){
        $data = $request->all();
        switch ($data['handle']) {
            case 'trash':
                $ids = $data['checkItem'];
                Brand::whereIn('id', $ids)->delete();
                return redirect()->back();
                break;
            case 'delete':
                $ids = $data['checkItem'];
                Brand::whereIn('id', $ids)->forceDelete();
                return redirect()->back();
                break;
                
            case 'restore':
                $ids = $data['checkItem'];
                Brand::whereIn('id', $ids)->restore();
                return redirect()->back();
                break;
            case 'restore-all':
                $ids = Brand::onlyTrashed()->pluck('id')->all();
                Brand::whereIn('id', $ids)->restore();
                break;
            case 'delete-all':
                $ids = Brand::onlyTrashed()->pluck('id')->all();
                Brand::whereIn('id', $ids)->forceDelete();
                break;  
            case 'trash-all':
                $ids = Brand::pluck('id')->all();
                Brand::whereIn('id', $ids)->delete();
                break;      
            default:
                # code...
                break;
        }
    }
}