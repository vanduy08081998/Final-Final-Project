<!-- Modal -->
<div class="modal fade updatePhone" wire:ignore.self id="updatePhoneModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Cập nhật số điện thoại</h5>
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


<div class="modal fade updateAddress" wire:ignore.self id="updateAddressModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Cập nhật địa chỉ</h5>
            </div>
            <form wire:submit.prevent="update_address">
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{URL::to('frontend/img/shop/account/address.png')}}" alt="" width="200">
                    </div>
                    <input type="hidden" wire:model="id_user">
                    <label class="form-label mt-2" for="account-email">Địa chỉ</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">A</span>
                        </div>
                        <input wire:model="address" type="text" class="form-control" placeholder="Địa chỉ">
                    </div>
                    @error('address')
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


<div class="modal fade updatePassword" wire:ignore.self id="updateAddressModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Thay đổi mật khẩu</h5>
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
