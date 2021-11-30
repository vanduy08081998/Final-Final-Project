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
                    <img src="{{URL::to('frontend/img/shop/account/address.png')}}" alt="" width="120">
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
