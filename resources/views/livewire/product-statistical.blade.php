          <div>
              <div class="d-flex justify-content-end sort-product mb-2">
                <div class="rating-search pb-4 mr-5">
                    <span class="font-weight-bold">Tìm kiếm:</span>
                    <input type="text" wire:model=search placeholder="Tìm đánh giá theo nội dung"
                        class="form-control search-text-review">
                </div>
                  <form wire:submit.prevent="render()">
                      <span class="font-weight-bold">Sắp xếp theo:</span>
                      <select style="font-weight: bold;color:blue" wire:model="sort" class="dashboard-filter form-control">
                          <option value="all">Tất cả sản phẩm</option>
                          <option value="selling">Sản phẩm bán chạy</option>
                          <option value="see_more">Sản phẩm xem nhiều</option>
                          <option value="appreciate">Sản phẩm đánh giá cao</option>
                      </select>

                  </form>
              </div>

              <div class="table-responsive">
                  <table class="table table-nowrap custom-table mb-3">
                      <thead>
                          <tr>
                              <th>Sản phẩm</th>
                              <th>Đánh giá</th>
                              <th>Bình luận</th>
                              <th>Lượt xem</th>
                              <th>Lượt mua</th>
                              <th>Doanh thu</th>
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
                                              <i class="fa fa-star fs-ms text-warning me-1"></i>
                                          @endfor
                                          @for ($count = 1; $count <= 5 - round($product->reviews->avg('count_rating')); $count++)
                                              <i class="fa fa-star-o fs-ms text-warning me-1"></i>
                                          @endfor
                                      @else
                                          <span class="badge bg-inverse-warning">Chưa có đánh giá!</span>
                                      @endif
                                  </td>

                                  <td class="text-left"><span class="badge bg-inverse-info">
                                          @if (count($product->comments) == 0)
                                              Chưa có bình luận!
                                          @else
                                              {{ count($product->comments) }} bình luận
                                          @endif
                                      </span></td>

                                  <td class="text-left"><span class="badge bg-inverse-primary">
                                          {{ $product->views }}
                                          lượt xem </span></td>
                                  <td class="text-left">
                                      <span class="badge bg-inverse-danger">{{ count($product->orders) }} lượt
                                          mua</span>
                                  </td>
                                  <td class="text-left">
                                      @if(count($product->orders)>0)
                                      <button class="btn btn-outline-success btn-show-chart{{ $product->id }} show_chart" onclick="chart_product_line({{$product->id}})"
                                        data-id="{{ $product->id }}"><i style="font-size: 16px" class="fas fa-chart-line"></i> Xem</button>
                                      @endif
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                  {{ $all_product->links('admin.statistics.page-link') }}
              </div>
          </div>
