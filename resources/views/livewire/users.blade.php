<div wire:ignore.self class="row gx-4 border">
    <div class="bg-secondary rounded-3 p-4 mb-4 border">
        <div class="d-flex align-items-center">
                @if (Auth::user()->avatar)
                <img class="customer_picture" src="{{ URL::to('uploads/Users/',Auth::user()->avatar) }}" width="90" alt="avatar">
                @else
                <img class="customer_picture" src="{{ URL::to('backend/img/profiles/avt.png') }}"width="90" alt="avatar">
                @endif
            <div class="ps-3">
                <label class="custom-file-upload btn btn-light btn-shadow btn-sm mb-2">
                    <input style="display: none" type="file" name="customer_avatar" id="customer_avatar" name="avatar" />
                   <a class="text-info" href="javascript:void(0)" id="change_avatar"> <i class="ci-loading me-2"></i>Thay ảnh đại diện </a>
                </label>
            </div>

        </div>
    </div>

    <div style="border-right:1px solid #E6E6FA;" class="col-sm-6 p-4">
        <h5 class="fs-base text-dark mb-0">Thông tin cá nhân</h5>

        <form wire:submit.prevent="update_profile({{Auth::user()->id}})">
            <div class="mt-4">
                <label class="form-label" for="account-email">Email *</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">EM</span>
                    </div>
                    <input name="email" name="email" type="email" value="{{Auth::user()->email}}" class="form-control"
                        placeholder="Địa chỉ email" disabled>
                </div>
            </div>
            <div class="mt-4">
                <label class="form-label" for="account-ln">Họ và tên *</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">HT</div>
                    </div>
                    <input type="text" class="form-control" wire:model="name" placeholder="Họ và tên">
                </div>
                @error('name')
                <span style="font-size:14px" class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label class="form-label" for="account-ln">Ngày sinh</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">NS</div>
                    </div>
                    <input type="date" class="form-control" wire:model="birthday">
                </div>
            </div>

            <label class="form-label mt-4" for="account-ln">Giới tính</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" wire:model="gender" id="inlineRadio1" value="male">
                <label class="form-check-label" for="inlineRadio1">Nam</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" wire:model="gender" id="inlineRadio2" value="female">
                <label class="form-check-label" for="inlineRadio2">Nữ</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" wire:model="gender" id="inlineRadio2" value="other">
                <label class="form-check-label" for="inlineRadio2">Khác</label>
            </div>

            <div class="col-12 mt-3">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <button type="submit" class="btn btn-primary mt-3 mt-sm-0">Lưu thay đổi</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-6 p-4">
        <h5 class="fs-base text-dark mb-0">Số điện thoại và địa chỉ</h5>
        <ul class="list-unstyled mt-3 ">
            <li class="border-bottom mb-0 ">
                <p class="d-flex align-items-center px-2 py-3">
                    <i class="ci-phone fa-lg me-2" aria-hidden="true"></i>
                    <span class="title_profile">Số điện thoại: <br>
                        @if(Auth::user()->phone) {{Auth::user()->phone}} @else Thêm số điện thoại @endif </span>
                    <button type="button" class="ml-2 btn btn-outline-info fs-sm text-muted ms-auto btn"
                        wire:click.prevent="edit_phone({{Auth::user()->id}})">Cập
                        nhật</button>
                </p>
            </li>
            <li class="border-bottom mb-0 ">
                <p class="d-flex align-items-center px-2 py-3">
                    <i class="ci-location fa-lg me-2" aria-hidden="true"></i>
                    <span class="title_profile">Địa chỉ: <br>
                        @if(Auth::user()->address) {{Auth::user()->address}} @else Thêm địa chỉ @endif </span>
                    <button type="button" class="ml-2 btn btn-outline-info fs-sm text-muted ms-auto btn"
                        wire:click.prevent="edit_address({{Auth::user()->id}})">Cập
                        nhật</button>
                </p>
            </li>
        </ul>
        <h5 class="fs-base text-dark mb-0">Bảo mật</h5>
        <ul class="list-unstyled">
            <li class="border-bottom mb-0">
                <p class="d-flex align-items-center px-2 py-3">
                    <i class="fa fa-key fa-lg me-2" aria-hidden="true"></i><span>Đổi mật khẩu </span>
                    <button type="button" class="btn btn-outline-info fs-sm text-muted ms-auto btn"
                    wire:click.prevent="edit_password({{Auth::user()->id}})">Cập
                        nhật</button>
                </p>
            </li>
        </ul>
    </div>
    @include('clients.account.account_udphone_modal')
</div>
