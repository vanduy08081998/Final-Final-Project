<?php

namespace App\Http\Controllers\Clients;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Wards;
use App\Models\Shipping;
use Auth;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Provinces::all();
        return view('clients.account.add_address')->with(compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $this->validate($request, [
            'fullname' => ['string', 'max:255'],
            'phone' => ['numeric', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})/'],
            'neighbor' => ['string','max:255','min:4']
        ],
        [
            'fullname.string'=> 'Tên tài khoản không hợp lệ!',
            'fullname.max'=> 'Họ và tên không quá 255 ký tự!',
            'phone.regex' => 'Số điện thoại không hợp lệ!',
            'phone.numeric' => 'Số điện thoại không hợp lệ!',
            'neighbor.string'=> 'Địa chỉ không hợp lệ!',
            'neighbor.max' => 'Địa chỉ không quá 255 ký tự!',
            'neighbor.min' => 'Địa chỉ không hợp lệ!',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth()->user()->id;
        $shipping_count = Shipping::where('user_id', Auth()->user()->id)->get()->count();
        if($shipping_count==0){
            $data['default']=1;
        }else{
        if($request->default=='on'){
            Shipping::where('default','1')->update(['default'=>0]);
            $data['default']=1;
        }else{
            $data['default']=0;
        }
        }
        Shipping::create($data);
        return back()->with('message','Cập nhật địa chỉ thành công !');
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
        $shipping = Shipping::find($id);
        $provinces = Provinces::all();
        $province = Provinces::find($shipping->province_id);
        $district = Districts::find($shipping->district_id);
        $districts = $province->districts;
        $wards = $district->wards;
        return view('clients.account.edit_address')->with(compact('shipping','provinces','districts','wards'));
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
        $this->validate($request, [
            'fullname' => ['string', 'max:255'],
            'phone' => ['numeric', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})/'],
            'neighbor' => ['string','max:255','min:4']
        ],
        [
            'fullname.string'=> 'Tên tài khoản không hợp lệ!',
            'fullname.max'=> 'Họ và tên không quá 255 ký tự!',
            'phone.regex' => 'Số điện thoại không hợp lệ!',
            'phone.numeric' => 'Số điện thoại không hợp lệ!',
            'neighbor.string'=> 'Địa chỉ không hợp lệ!',
            'neighbor.max' => 'Địa chỉ không quá 255 ký tự!',
            'neighbor.min' => 'Địa chỉ không hợp lệ!',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth()->user()->id;
        if($id == Shipping::where('default','1')->first()->id){
            $data['default']=1;
        }else{
            if($request->default=='on'){
                Shipping::where('default','1')->update(['default'=>0]);
                $data['default']=1;
            }
            else{
                $data['default']=0;
            }
        }

        Shipping::find($id)->update($data);
        return back()->with('message','Cập nhật địa chỉ thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Shipping::find($id)->delete();
        return back()->with('message','Xóa địa chỉ thành công !');
    }

    public function select_address(Request $request){
        $data = $request->all();
        $ma_id = $data['ma_id'];
        $output = '';
        if($data['action']=='province'){
          $select_districts = Districts::where('province_id',$ma_id)->orderby('id','ASC')->get();
          $output.='<option value="">Chọn quận, huyện</option>';
          foreach($select_districts as $key => $district){
              $output.='<option value="'.$district->id.'">'.$district->name.'</option>';
          }
        }else{
            $select_wards = Wards::where('district_id', $ma_id)->orderby('id','ASC')->get();
            $output.='<option value="">Chọn xã, phường</option>';
            foreach($select_wards as $key => $wards){
              $output.='<option value="'.$wards->id.'">'.$wards->name.'</option>';
            }
        }
        echo $output;
    }
}
