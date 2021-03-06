<h2 class="h6 pt-1 pb-3 mb-3 border-bottom col-12">Thông tin giao hàng</h2>
@php
use App\Models\Cart;
@endphp
@auth
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
      <!-- Content  -->
      <section class="col-lg-12">
        <div class="align-middle add-ship mb-3">
          <a class="add-shipping button-action" data-action="add" data-bs-toggle="modal" style="cursor: pointer"
            data-bs-target="#addressModal"><i class="fa fa-plus fa-lg aria-hidden"></i> Thêm địa chỉ mới
          </a>
        </div>
        @if (session('message'))
          <div class="alert alert-success" role="alert">
            {{ session('message') }}
          </div>
        @endif
        <!-- Addresses list-->
        <div class="table-responsive fs-md">
          <table class="table table-hover mb-0">
            <tbody>
              @if ($shipping_default)
                <tr class="table-dark form-address-default">
                  <td class="py-3 align-middle">
                    <i class="bi bi-check2-circle"></i>
                    <p>
                      <span class="text-white"
                        style="text-transform: uppercase">{{ $shipping_default->fullname }}</span>
                      <span class="align-middle text-success ms-2"><i class="fa fa-check-circle-o"></i>
                        Địa chỉ mặc định</span>
                    </p>
                    <p class="text-white"> Địa chỉ: {{ $shipping_default->neighbor }} -
                      {{ $shipping_default->ward->name }} -
                      {{ $shipping_default->district->name }} -
                      {{ $shipping_default->province->name }}
                    </p>
                    <p class="text-white"> Số điện thoại: {{ $shipping_default->phone }}</p>
                  </td>
                  <td class="py-3 align-middle"><a class="btn btn-info btn-sm nav-link-style me-2 button-action" href="#"
                      data-action="edit-default" data-bs-toggle="modal"
                      data-bs-target="#editAddressDefaultModal{{ $shipping_default->id }}" title="Sửa"><i
                        class="ci-edit"></i> Chỉnh
                      sửa</a>
                  </td>
                </tr>
                @include('clients.checkout.Checkout.edit-default',['id' => $shipping_default->id])
              @else
              @endif
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
      <!-- Content  -->
      <section class="col-lg-12">
        <form id="form-infomations" method="POST">
          {{ csrf_field() }}
          @isset($shipping_default)
            <input type="hidden" name="name" value="{{ $shipping_default->ward->name }}">
            <input type="hidden" name="phone" value="{{ $shipping_default->phone }}">
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            <input type="hidden" name="address"
              value="{{ $shipping_default->neighbor }} -
                                                        {{ $shipping_default->ward->name }} -
                                                        {{ $shipping_default->district->name }} - {{ $shipping_default->province->name }}">
          @endisset

          @empty($shipping_default)
            <h5 style="font-style: italic; color: red">Bạn chưa có địa chỉ mặc định</h5>
          @endempty

          @if (count(Cart::where('user_id', auth()->user()->id)->get()) <= 0)
          <div class="row">
            <div class="col-md-6 mt-3">
              <button class="btn btn-primary" disabled>Mua hàng để chuyển đến bước tiếp theo</button>
            </div>
          </div>
        @else
          <div class="row">
            <div class="col-md-6 mt-3 btn-checkout-btn">
              <button class="btn btn-primary">Chuyển đến bước tiếp theo &rarr;</button>
            </div>
          </div>
          @endif
        </form>
        <div class="row">
          <div class="col-md-6 mt-3 btn-checkout-btn">
            <a href="{{ route('cart.cart-list') }}"><button class="btn btn-danger">&larr; Quay lại trang trước</button></a>
          </div>
        </div>
      </section>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
      <!-- Content  -->
      <section class="col-lg-12">
        <table class="table table-primary mb-0">
          <tbody>
            @foreach ($shipping_all as $key => $shipping_address)
              <tr>
                <td class="py-3 align-middle">
                  <p style="text-transform: uppercase">{{ $shipping_address->fullname }}</p>
                  <p>Địa chỉ: {{ $shipping_address->neighbor }} -
                    {{ $shipping_address->ward->name }} -
                    {{ $shipping_address->district->name }} -
                    {{ $shipping_address->province->name }} </p>
                  <p> Số điện thoại: {{ $shipping_address->phone }}</p>
                </td>
                <td class="py-3 align-middle">
                  <a class="btn btn-info btn-sm nav-link-style me-2 mb-2 button-action" href="#" data-action="edit"
                    data-bs-toggle="modal" data-bs-target="#editAddressModal{{ $shipping_address->id }}" title="Sửa"><i
                      class="ci-edit"></i>
                    Chỉnh sửa</a>
                  <form action="{{ route('shippings.destroy', ['shipping' => $shipping_address->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm nav-link-style text-danger" title="Xóa">
                      <i class="ci-trash"> Xóa</i>
                    </button>
                  </form>
                </td>
              </tr>
              @include('clients.checkout.Checkout.edit_address_modal',['id' => $shipping_address->id])
            @endforeach
          </tbody>
        </table>
      </section>
    </div>
  </div>
@endauth

@guest
  <h1>Đăng nhập để thanh toán</h1>
@endguest
