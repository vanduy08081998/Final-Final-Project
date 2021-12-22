<div>
    <div class="d-flex justify-content-end sort-product mb-2">
        <form wire:submit.prevent="render()">
            <select style="font-weight: bold;color:blue;min-width:200px" wire:model="sort_google" class="form-control">
                <option value="today">Hôm nay</option>
                <option value="yesterday">Hôm qua</option>
                <option value="week">Tuần này</option>
                <option value="month">Tháng này</option>
            </select>

        </form>
    </div>

    <div style="max-height: 600px;" class="table-responsive">
        <table class="table table-striped custom-table mb-3">
            <thead>
                <tr style="background: rgb(62, 58, 58); color:white">
                    <th>Ngày</th>
                    <th>Truy cập</th>
                    <th>Tiêu đề Trang</th>
                    <th>Lượt xem trang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($analyticsData as $data)
                    <tr>
                        <td class="text-left"><a class="text-dark"
                                href="invoice-view.html">{{ $data['date'] }}</a>
                        </td>
                        <td class="text-left"><a class="text-dark"
                                href="invoice-view.html">{{ $data['visitors'] }}</a>
                        </td>
                        <td class="text-left"><a class="text-dark"
                                href="invoice-view.html">{{ $data['pageTitle'] }}</a>
                        </td>
                        <td class="text-left"><a class="text-dark"
                                href="invoice-view.html">{{ $data['pageViews'] }}</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $analyticsData->links('admin.statistics.page-link') }} --}}
    </div>
</div>
