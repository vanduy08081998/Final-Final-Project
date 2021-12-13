<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Services\GeneralService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $generalService , $path;
    public function __construct(GeneralService $generalService)
    {
        $this->path = 'uploads/Banner/';
        $this->generalService = $generalService;
    }
    public function index()
    {
        $bannerAll = Banner::orderByDESC('id')->get();
        return view('admin.banner.index',['bannerAll'=>$bannerAll,]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBannerRequest $request)
    {

        $data = $request->validated();
        $data['banner_img'] = $this->generalService->uploadImage($this->path ,$request->banner_img);
        Banner::create($data);
        return redirect()->route('banners.create');
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
        $bannerId = Banner::find($id);
        return view('admin.banner.edit', compact('bannerId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, $id)
    {
        // dd($request->all());
        $data = $request->validated();
        $bannerId = Banner::find($id);
        if($request->banner_img){
            $data['banner_img'] = $this->generalService->uploadImage($this->path, $request->banner_img);
           // Xóa hình ảnh cũ
           $this->generalService->deleteImage($this->path, $bannerId->banner_img);
        }
        $bannerId->update($data);
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
        Banner::find($id)->delete();
        return back()->with('message', 'Xóa dữ liệu thành công');
    }
}