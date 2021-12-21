<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Review;
use App\Models\OrderDetail;
use App\Models\Comment;
use Livewire\WithPagination;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class ProductStatistical extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sort, $search;

    protected $listeners = [
        'render' => 'render',
    ];


    public function close_chart_product(){
        $this->emit('render');
    }
    public function render()
    {
        if($this->search){
            $all_product = Product::with(['reviews','comments','orders'])->where('product_name', 'LIKE','%'.$this->search.'%')->paginate(10);
        }
        elseif($this->sort == 'selling'){
            $count_buy = DB::table('order_details')
            ->select('product_id', DB::raw('count(*) as count_buy'))
           ->groupBy('product_id')
             ->orderBy('count_buy', 'DESC')
           ->pluck('product_id')
           ->all();
         $all_product = Product::with(['reviews','comments','orders'])->whereIn('id', $count_buy)->orderByRaw(\DB::raw("FIELD(id, ".implode(",",$count_buy).")"))->paginate(10);
        }
        elseif($this->sort=='appreciate'){
          $avg_rating = DB::table('review')->where('count_rating','!=',null)
          ->select('product_id', DB::raw('avg(count_rating) as count_rating'))
          ->groupBy('product_id')
          ->orderBy('count_rating', 'DESC')
          ->pluck('product_id')
          ->all();
          $all_product = Product::with(['reviews','comments','orders'])->whereIn('id', $avg_rating)->orderByRaw(\DB::raw("FIELD(id, ".implode(",",$avg_rating).")"))->paginate(10);
        }
        elseif($this->sort == 'see_more'){
            $all_product = Product::with(['reviews','comments','orders'])->where('views','>',0)->latest('views')->paginate(10);
        }elseif($this->sort == 'all'){
            $all_product = Product::with(['reviews','comments','orders'])->latest()->paginate(10);
        }
        else{
            $all_product = Product::with(['reviews','comments','orders'])->latest()->paginate(10);
        }
        return view('livewire.product-statistical', compact('all_product'));
    }
}
