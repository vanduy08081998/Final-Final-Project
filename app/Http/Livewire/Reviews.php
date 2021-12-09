<?php

namespace App\Http\Livewire;
use App\Models\Review;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Reviews extends Component
{
    public $product, $review_content, $count_rating, $userLoginId;
    protected $listeners = ['render' => 'mount'];

    public function mount()
    {
        if (Auth::user()) {
            $this->userLoginId = Auth::user()->id;
        } else {
            $this->userLoginId = 0;
        }

    }
    public function add_review(){
      $this->dispatchBrowserEvent('OpenNewReviewModal', [

      ]);
    }

    public function close_review(){
        $this->dispatchBrowserEvent('CloseNewReviewModal');
    }
    public function render()
    {
        $product = Product::find($this->product->id);
        $avg = round(Review::where([['product_id', $product->id],['review_status',1]])->avg('count_rating'),1);
        $rating_avg = round(Review::where([['product_id', $product->id],['review_status',1]])->avg('count_rating'));
        $introduce_review = count(Review::where([['product_id', $product->id],['review_status',1],['introduce',1]])->get());
        $all_count_review = count(Review::where([['product_id', $product->id],['review_status',1]])->get());
        if($all_count_review==0){
            $all_count_review = 1;
        }
        $all_review = Review::where([['product_id', $product->id],['review_status',1]])->latest()->get();
        $id_review = count(Review::where([['product_id', $product->id],['customer_id',Auth::user()->id]])->get());
        $fivestar = round(count(Review::where([['product_id', $product->id],['review_status',1],['count_rating',5]])->get())/$all_count_review*100);
        $fourstar = round(count(Review::where([['product_id', $product->id],['review_status',1],['count_rating',4]])->get())/$all_count_review*100);
        $threestar = round(count(Review::where([['product_id', $product->id],['review_status',1],['count_rating',3]])->get())/$all_count_review*100);
        $twostar = round(count(Review::where([['product_id', $product->id],['review_status',1],['count_rating',2]])->get())/$all_count_review*100);
        $onestar = round(count(Review::where([['product_id', $product->id],['review_status',1],['count_rating',1]])->get())/$all_count_review*100);
        return view('livewire.reviews')->with(compact('avg','rating_avg','all_count_review','all_review','id_review','introduce_review','fivestar','fourstar','threestar','twostar','onestar'));
    }
}
