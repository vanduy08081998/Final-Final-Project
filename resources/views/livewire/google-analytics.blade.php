<div>
    
            
            <div class="sort-product mb-2" style="display: flex; align-items: center; justify-content: center;position: relative;">
        <h3 class="text-danger font-weight-bold mb-4">Dữ liệu khách truy cập và số lượt xem trang</h3>
        <form wire:submit.prevent="render()" style="position: absolute; right: 0">
            <select style="font-weight: bold;color:blue;min-width:200px" wire:model="sort_google" class="form-control">
                <option value="today">Hôm nay</option>
                <option value="yesterday">Hôm qua</option>
                <option value="week">7 ngày trước</option>
                <option value="month">30 ngày trước</option>
            </select>

        </form>
    </div>

    <div class="header-table">
        <span>Ngày</span>
        <span>Truy cập</span>
        <span>Tiêu đề Trang</span>
        <span>Lượt xem trang</span>
    </div>

    <div style="max-height: 500px;" class="table-responsive">
        <table class="table table-striped custom-table mb-3">
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

    <style>
        .header-table{
            display: flex;
            width: 100%;
            background: #34444c;
            align-items: center;
            padding: 15px 20px;

        }

        .header-table span{
            color: #fff;
            font-size: 16px;
            font-weight: 400;
            
        }
        .header-table span:nth-child(1){
           width: 25%;
        }
        .header-table span:nth-child(2){
           width: 10%;
           padding-left: 20px;
        }

        .header-table span:nth-child(3){
            width: 40%;
            padding-left: 35px;
        }
        .header-table span:nth-child(4){
            width: 25%;
            padding-left: 170px;
        }

        .table-responsive::-webkit-scrollbar {
        width: 10px;
        }

        /* Track */
        .table-responsive::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        }

        /* Handle */
        .table-responsive::-webkit-scrollbar-thumb {
        background: #66CCFF;
        border-radius: 10px;
        }
    </style>
</div>
