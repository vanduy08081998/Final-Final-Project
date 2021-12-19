<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminAll = User::where('position','admin')->latest()->get();
        $countTrashed = User::where('position','admin')->onlyTrashed()->count();
        return view('admin.users.index', compact('adminAll','countTrashed'));
    }

    public function list_customer(){
        $customerAll = User::where('position',null)->get();
        $countTrashed = User::where('position',null)->onlyTrashed()->count();
        return view('admin.users.list_customer', compact('customerAll','countTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_roles = Role::all();
        return view('admin.users.create')->with(compact('all_roles'));
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
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->position = 'admin';
        $user->password = Hash::make($data['password']);
        $user->syncRoles($data['role']);
        $user->save();
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
        dd($userId);
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
    public function admin_trash(){
        $userAll = User::where('position', 'admin')->onlyTrashed()->get();
        return view('admin.users.trash', compact('userAll'));
    }

    public function customer_trash(){
        $userAll = User::where('position', null)->onlyTrashed()->get();
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

    public function assignRoles($id)
    {
        $user = User::find($id);
        $role = Role::all();
        $user_role = $user->roles->first();
        return view('admin.users.assign_roles')->with(compact('user','role','user_role'));
    }

    public function insertRoles(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $user->syncRoles($data['role']);
        return back()->with('message', 'Cấp vai trò thành công');
    }

    public function list_role()
    {
        $all_roles = Role::latest()->get();
        return view('admin.users.list_roles')->with(compact('all_roles'));
    }

    public function delete_role($id)
    {
        $role = Role::find($id);
        $users = User::role($role->name)->get();
        foreach ($users as $user){
            $user->removeRole($role->name);
        }
        $role->delete();
        return back()->with('message','Xóa vai trò thành công');
    }
    public function create_role(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
        ],
        [
            'name.required' => 'Tên vai trò không được bỏ trống!',
        ]
        );
        Role::create(['name'=>$request['name']]);
        return back()->with('message1','Thêm vai trò thành công');
    }

    public function add_permissions($id)
    {
        $role = Role::find($id);
        $all_permissions = Permission::latest()->get();
        $permissions_by_role = $role->permissions->pluck('id')->all();
        return view('admin.users.assign_permissions')->with(compact('role','all_permissions','permissions_by_role'));
    }
    public function assign_permissions(Request $request, $id)
    {
        $role = Role::find($id);
        if($request->permissions==null){
            $role->syncPermissions();
        }else{
            $role->syncPermissions($request->permissions);
        }
        return Redirect()->back()->with('message', 'Cấp quyền thành công');
    }

    public function add_redirect_permissions($id)
    {
       $user = User::find($id);
       $user_redirect_permissions = $user->getDirectPermissions()->pluck('id')->all();
       $all_permissions = Permission::all();
       return view('admin.users.assign_redirect_permissions')->with(compact('user','user_redirect_permissions','all_permissions'));
    }

    public function assign_redirect_permissions(Request $request, $id)
    {
        $user = User::find($id);
        if($request->permissions==null){
            $user->syncPermissions();
        }else{
            $user->syncPermissions($request->permissions);
        }
        return back()->with('message','Cấp quyền thành công');
    }

    public function impersonate($id)
    {
        $user = User::find($id);
        if($user){
            Session::put('impersonate',$user->id);
        }
        return redirect()->route('admin.index');
    }

    public function history($id)
    {
        $orders = Order::where('user_id', $id)->get();
        $delivery_viewed = DB::table('delivery_viewed')->get();
        return view('admin.users.history', compact('orders', 'delivery_viewed'));
    }

    public function impersonate_destroy()
    {
        Session::forget('impersonate');
        return redirect()->route('users.index');
    }

    public function lockAccount(Request $request)
    {
        $user = User::find($request->id);
        $user->update(['user_status' => $request->val]);
    }

    public function lockComment(Request $request)
    {
        $user = User::find($request->id);
        $user->update(['user_status' => $request->val]);
    }
}
