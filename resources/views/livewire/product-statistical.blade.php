          <div class="table-responsive">
              <table class="table table-nowrap custom-table mb-3">
                  <thead>
                      <tr>
                          <th>Sản phẩm</th>
                          <th>Đánh giá</th>
                          <th>Bình luận</th>
                          <th>Lượt xem</th>
                          <th>Lượt mua</th>
                          <th>Bán ra</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($all_product as $key => $product)
                          <tr>
                              <td class="text-left"><a class="text-dark"
                                      href="invoice-view.html">{{ Str::limit($product->product_name, 20, '...') }}</a>
                              </td>
                              <td class="text-left">
                                  @if ($product->reviews->avg('count_rating') != 0)
                                      <strong>{{ round($product->reviews->avg('count_rating'), 1) }}</strong>
                                      @for ($count = 1; $count <= round($product->reviews->avg('count_rating')); $count++)
                                          <i class="fa fa-star fs-ms text-danger me-1"></i>
                                      @endfor
                                      @for ($count = 1; $count <= 5 - round($product->reviews->avg('count_rating')); $count++)
                                          <i class="fa fa-star-o fs-ms text-danger me-1"></i>
                                      @endfor
                                  @else
                                      <span class="badge bg-inverse-warning">Chưa có đánh giá!</span>
                                  @endif
                              </td>

                              <td class="text-left"><span class="badge bg-inverse-info">
                                      @php
                                          $count_comment = 0;
                                      @endphp
                                      @foreach ($product->comments as $pro_com)
                                          @if ($pro_com->comment_parent_id == 0)
                                              @php
                                                  $count_comment++;
                                              @endphp
                                          @endif
                                      @endforeach
                                      @if ($count_comment == 0)
                                          Chưa có bình luận!
                                      @else
                                          {{ $count_comment }} bình luận
                                      @endif
                                  </span></td>

                              <td class="text-left"><span class="badge bg-inverse-primary"> {{ $product->views }}
                                      lượt xem </span></td>
                              <td class="text-left">
                                  <span class="badge bg-inverse-danger">{{ count($product->orders) }} lượt mua</span>
                              </td>
                              <td class="text-left">
                                  <button class="btn btn-success btn-show-chart{{ $product->id }} show_chart"
                                      data-id="{{ $product->id }}"><i style="font-size: 16px"
                                          class="fas fa-chart-line"></i> Xem</button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
              {{ $all_product->links('admin.statistics.page-link') }}
          </div>
