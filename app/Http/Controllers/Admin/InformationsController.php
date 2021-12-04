<?php

namespace App\Http\Controllers\Admin;

use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddInforRequest;

class InformationsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infors = Information::all();
        return view('admin.informations.index', compact('infors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AddInforRequest $validate)
    {
        Information::create($request->all());
        return redirect()->route('informations.index');
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
        $infors = Information::find($id);
        return view('admin.informations.edit', compact('infors'));
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
        Information::find($id)->update($request->all());
        return redirect()->route('informations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $infors)
    {
        $infors->delete();
        return redirect()->back();
    }

    public function statusInfor(Request $request)
    {
        $infor = Information::find($request->id);
        $infor->update([
            'infor_status' => $request->value
        ]);
    }

}
