<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAll = User::orderByDESC('id')->get();
        $countTrashed = User::onlyTrashed()->count();
        return view('admin.users.index', compact('userAll','countTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        $data = $request->validated();
                     User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return back()->with('message','Thêm tài khoản thành công');
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
        $userId = User::find($id);
        return view('admin.users.edit', compact('userId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $userId = User::find($id);
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $userId->update($data);
        return back()->with('message','Cập nhật tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash(){
        $userAll = User::onlyTrashed()->get();
        return view('admin.users.trash', compact('userAll'));
    }

    public function restore($id){
        User::where('id', $id)->restore();
        return back()->with('message', 'Đã khôi phục tài khoản');
    }

    public function forceDelete($id){
        $userId = User::withTrashed()->find($id)->forceDelete();
        return back()->with('message', 'Xóa tài khoản vĩnh viễn thành công');
    }

    public function destroy($id)
    {
        $userId = User::find($id)->delete();
        return back()->with('message','Xóa tài khoản thành công');
    }

}
