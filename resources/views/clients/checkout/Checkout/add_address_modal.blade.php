<!-- Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body">
        <form action="{{route('shippings.store')}}" method="post">
          @csrf
          @if (session('message'))
          <div class="alert alert-success" role="alert">
            {{ session('message') }}
          </div>
          @endif
          <div class="body route mt-3" data-url="{{route('select-address')}}">
            <div class="row gx-4 gy-3">
              <div class="col-sm-6">
                <label class="form-label">Họ và tên</label>
                <input class="form-control" name="fullname" type="text" value="{{ old('fullname') }}" required>
                @error('fullname')
                <span style="font-size:14px" class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-sm-6">
                <label class="form-label">Số điện thoại</label>
                <input class="form-control" name="phone" type="text" value="{{ old('phone') }}" required>
                @error('phone')
                <span style="font-size:14px" class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-sm-6">
                <label class="form-label">Tỉnh/thành phố</label>
                <select class="form-control choose province" id="province" name="province_id" required>
                  <option value="">Chọn tỉnh, thành phố</option>
                  @foreach ($provinces as $province)
                  <option value="{{ $province->id }}">{{ $province->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-6">
                <label class="form-label">Quận/huyện</label>
                <select class="form-control choose district" id="district" name="district_id" required>
                  <option value="">Chọn quận, huyện</option>

                </select>
              </div>
              <div class="col-sm-6">
                <label class="form-label">Xã/Phường/Thị trấn</label>
                <select class="form-control" id="ward" name="ward_id" required>
                  <option value="">Chọn xã, phường</option>

                </select>
              </div>
              <div class="col-sm-6">
                <label class="form-label">Làng, xóm, số đường, số nhà,...</label>
                <input class="form-control" type="text" name="neighbor" value="{{ old('neighbor') }}" required>
                @error('neighbor')
                <span style="font-size:14px" class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-sm-6">
                <label class="form-label">Loại địa chỉ</label>
                <select class="form-control" name="address_type">
                  <option value="0">Nhà riêng / Chung cư</option>
                  <option value="1">Cơ quan / Công ty</option>
                </select>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="default" checked>
                  <label class="form-check-label" for="address-primary">Đặt làm địa chỉ mặc định</label>
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