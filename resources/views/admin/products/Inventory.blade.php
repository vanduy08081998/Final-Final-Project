@extends('admin.layouts.master')

@section('title', 'Quản lý sản phẩm tồn kho')

@section('content')
  <!-- Page Wrapper -->

  <div class="content container-fluid">

    @include('admin.inc.page-header',['bread_title' => 'Trang quản trị', 'bread_item' => 'Quản tồn kho'])
    <div class="row">
      <div class="col-sm-12">
        <div class="card mb-0">
          <div class="card-body">
            <div class="table-responsive">

              <table class="datatable table table-stripped table-bordered table-hovered">
                <thead class="text-center">
                  <tr>
                    {{-- <th>Tên sản phẩm</th> --}}
                    <th>SKU</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    @if ($product->type_of_category == 'isAttribute')
                      @foreach ($product->variants as $key => $variant)
                        <tr>
                          {{-- <td>{{ $product->product_name }}</td> --}}
                          <td>{{ $variant->variant }}</td>
                          <td>{{ $variant->variant_quantity }}</td>
                          <td><button type="button" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"
                              data-toggle="modal" data-target="#exampleModal{{ $variant->id }}">
                              <i class="fa fa-shopping-cart"></i> Nhập kho
                            </button></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $variant->id }}" tabindex="-1" role="dialog"
                          aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $variant->variant }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('products.editwarehouse', $variant->id) }}" method="post"
                                  enctype="multipart/form">
                                  @csrf
                                  <div class="form-group">
                                    <input type="number" name="variant_quantity" id="" class="form-control rounded-0">
                                  </div>
                                  <button type="submit" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5">
                                    <i class="fa fa-shopping-cart"></i> Nhập kho
                                  </button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    @else
                      <tr>
                        <td>
                          {{ $product->sku }}
                        </td>
                        <td>
                          {{ $product->quantity }}
                        </td>
                        <td>
                          <button class="btn btn-success btn-flat btn-addon m-b-10 m-l-5" data-toggle="modal"
                            data-target="#exampleModal">
                            <i class="fa fa-shopping-cart"></i> Nhập kho
                          </button>
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">{{ $product->product_name }}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ route('products.editquantity', $product->id) }}" method="post"
                                    enctype="multipart/form">
                                    @csrf
                                    <div class="form-group">
                                      <input type="number" name="quantity" id="" class="form-control rounded-0">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5">
                                      <i class="fa fa-shopping-cart"></i> Nhập kho
                                    </button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endif
                  @endforeach

                </tbody>

              </table>



            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
