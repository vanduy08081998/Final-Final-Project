<!-- Modal -->
<div class="modal fade updatePhone" wire:ignore.self id="updatePhoneModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Cập nhật số điện thoại</h5>
                <button type="button" wire:click.prevent="close_modal()">
                   <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="update_phone">
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{URL::to('frontend/img/shop/account/phone.png')}}" alt="" width="120">
                    </div>
                    <input type="hidden" wire:model="id_user">
                    <label class="form-label mt-2" for="account-email">Số điện thoại</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">P</span>
                        </div>
                        <input wire:model="phone" type="number" class="form-control" placeholder="Số điện thoại">
                    </div>
                    @error('phone')
                    <span style="font-size:14px" class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade updateAddress" wire:ignore id="updateAddressModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div style="max-width: 900px" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Cập nhật địa chỉ</h5>
                <button type="button" wire:click.prevent="close_modal()">
                   <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="update_address">
                <div data-url="{{route('select-address')}}" class="modal-body row route">
                    <div class="text-center">
                        <img src="{{URL::to('frontend/img/shop/account/address.png')}}" alt="" width="200">
                    </div>
                    <input type="hidden" wire:model="id_user">
                    <div class="form-group col-md-4">
                        <label class="form-label mt-2" for="account-email">Tỉnh/Thành phố</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">T</span>
                            </div>

                            <select class="form-control choose province" id="province" required wire:model="province_id">
                                <option value="">Chọn tỉnh, thành phố</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label mt-2" for="account-email">Quận/huyện</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Q</span>
                            </div>
                            <select class="form-control choose district" id="district" required  wire:model="district_id">
                                <option value="">Chọn quận, huyện</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label mt-2" for="account-email">Xã/Phường/Thị trấn</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Q</span>
                            </div>
                            <select class="form-control" id="ward" required wire:model="ward_id">
                                <option value="">Chọn xã, phường</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label class="form-label mt-2" for="account-email">Làng, xóm, số đường, số nhà,...</label>
                        <textarea class="form-control" id="neighbor" required wire:model="neighbor"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade updatePassword" wire:ignore.self id="updateAddressModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Thay đổi mật khẩu</h5>
                <button type="button" wire:click.prevent="close_modal()">
                   <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="update_password">
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{URL::to('frontend/img/shop/account/password.png')}}" alt="" width="170">
                    </div>
                    <input type="hidden" wire:model="id_user">
                    <div class="form-group">
                        <label class="form-label mt-2" for="account-email">Mật khẩu</label>
                        <div id="show_hide_password" class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">P</span>
                            </div>
                            <input type="password" wire:model="password" class="pass_conf form-control"
                                placeholder="Mật khẩu" />
                            <div class="input-group-append"> <a style="height:45px" href="javascript:;"
                                    class="input-group-text bg-transparent border-left-0 lg">
                                    <i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        @error('password')
                        <span style="font-size:14px" class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label mt-3" for="account-email">Xác nhận mật khẩu</label>
                        <div id="show_hide_password2" class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">P</span>
                            </div>
                            <input type="password" wire:model="password_confirmation" class="pass_conf form-control"
                                placeholder="Xác nhận mật khẩu" />
                            <div class="input-group-append"> <a style="height:45px" href="javascript:;"
                                    class="input-group-text bg-transparent border-left-0 lg">
                                    <i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>


