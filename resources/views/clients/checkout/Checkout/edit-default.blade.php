
<div class="modal fade" id="editAddressDefaultModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <?php $shipping = \App\Models\Shipping::where('id', $id)->first() ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('shippings.update', ['shipping' => $shipping->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="align-middle add-ship mb-3">
                        <a class="add-shipping" href="{{route('account.account-address')}}"><i
                                class="fa fa-list fa-lg aria-hidden"></i> Danh sách địa chỉ</a>
                    </div>
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    <div class="body route mt-3" data-url="{{route('select-address')}}">
                        <div class="row gx-4 gy-3">
                            <div class="col-sm-6">
                                <label class="form-label">Họ và tên</label>
                                <input class="form-control" name="fullname" type="text" value="{{$shipping->fullname}}"
                                    required>
                                @error('fullname')
                                <span style="font-size:14px" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Số điện thoại</label>
                                <input class="form-control" name="phone" type="text" value="{{$shipping->phone}}"
                                    required>
                                @error('phone')
                                <span style="font-size:14px" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Tỉnh/thành phố</label>
                                <select class="form-control choose-default-edit province" data-edit="province" id="province-default-edit" name="province_id" required>
                                    <option value="">Chọn tỉnh, thành phố</option>
                                    @foreach ($provinces as $province)
                                    <option {{ $province->id == $shipping->province_id ? 'selected' : ''}} value="{{
                                        $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Quận/huyện</label>
                                <select class="form-control choose-default-edit district" data-edit="district"  id="district-default-edit" name="district_id" required>
                                    <option value="">Chọn quận, huyện</option>
                                    @foreach (\App\Models\Provinces::find($shipping->province_id)->districts as $district)
                                    <option {{ $district->id == $shipping->district_id ? 'selected' : ''}} value="{{
                                        $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Xã/Phường/Thị trấn</label>
                                <select class="form-control" id="ward-default-edit" name="ward_id" required>
                                    <option value="">Chọn xã, phường</option>
                                    @foreach (\App\Models\Districts::find($shipping->district_id)->wards as $ward)
                                    <option {{ $ward->id == $shipping->ward_id ? 'selected' : ''}} value="{{ $ward->id
                                        }}">{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Làng, xóm, số đường, số nhà,...</label>
                                <input class="form-control" type="text" name="neighbor"
                                    value="{{ $shipping->neighbor }}" required>
                                @error('neighbor')
                                <span style="font-size:14px" class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Loại địa chỉ</label>
                                <select class="form-control" name="address_type">
                                    <option {{$shipping->address_type == 0 ? 'selected' : ''}} value="0">Nhà riêng /
                                        Chung
                                        cư</option>
                                    <option {{$shipping->address_type == 1 ? 'selected' : ''}} value="1">Cơ quan / Công
                                        ty
                                    </option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="default" {{$shipping->default == 1 ? 'checked
                                    disabled' : ''}} type="checkbox" >
                                    <label class="form-check-label" for="address-primary">Đặt làm địa chỉ mặc
                                        định</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-shadow mt-3" type="submit">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

