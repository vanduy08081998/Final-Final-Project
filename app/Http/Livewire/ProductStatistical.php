<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Review;
use App\Models\OrderDetail;
use App\Models\Comment;
use Livewire\WithPagination;

class ProductStatistical extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function close_chart_product(){
        $this->emit('render');
    }
    public function render()
    {
        $all_product = Product::with(['reviews','comments','orders'])->latest()->paginate(10);
        // foreach($all_product as $key => $product){
        //     $product->reviews = round(Review::where([['product_id', $product->id],['review_status',1], ['review_parent', null]])->avg('count_rating'),2);
        //     $product->review = round(Review::where([['product_id', $product->id],['review_status',1], ['review_parent', null]])->avg('count_rating'));
        //     $product->comments = count(Comment::where([['comment_id_product', $product->id],['comment_parent_id',0]])->get());
        //     $product->count_buy = count(OrderDetail::where('product_id', $product->id)->get());
        // }
        // $all_product = $all_product->sortByDesc('reviews')->paginate(10);
        return view('livewire.product-statistical')->with(compact('all_product'));
    }
}
