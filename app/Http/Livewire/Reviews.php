<?php

namespace App\Http\Livewire;
use App\Models\Review;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Reviews extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $product, $count_rating, $userLoginId, $content_rating, $sort, $introduce, $image;
    public $checkfivestar, $checkfourstar, $checkthreestar, $checktwostar, $checkonestar;
    public $search,$view;
    protected $listeners = ['render' => 'mount'];

    public function mount()
    {
        if (Auth::user()) {
            $this->userLoginId = Auth::user()->id;
        } else {
            $this->userLoginId = 'off';
        }
        $this->content_rating = '';
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
        $all_list_review = 
        Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1],['image','!=',null]])->latest('id')->get();
        $list_image_array = [];
        foreach($all_list_review as $key => $review){
                    $str = $review->image;
                    $image_array = explode(',', $str);
                    array_push($list_image_array, $image_array[0]);         
        }

        if($this->view){
            $view = $this->view;
        }else{
            $view = 'livewire.reviews';
        }
        $check = '';
        if($this->search){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1],['content_rating','LIKE','%'.$this->search.'%']])->latest('id')->paginate(5);
        }
        elseif($this->sort){
            // dd($this->sort);
            switch($this->sort){
                case 'Mới nhất':
                    $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1]])->latest('id')->paginate(5);
                    break;
                case 'Hữu ích':
                    $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1]])->orderby('useful', 'DESC')->paginate(5);
                    break;
                case 'Đánh giá cao':
                    $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1]])->orderby('count_rating', 'DESC')->paginate(5);
                    break;
                case 'Đánh giá thấp':
                    $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1]])->orderby('count_rating', 'ASC')->paginate(5);
                break;
                case 'review_image':
                    if($this->introduce){
                        $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['image', '!=', null],['introduce', '!=', null],['review_status',1]])->latest('id')->paginate(5);
                    }else{
                        $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['image', '!=', null],['review_status',1]])->latest('id')->paginate(5);
                    }
                break;

                default :
                   
                    break;
            }
        }elseif($this->checkfivestar){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['count_rating', 5],['review_status',1]])->latest('id')->paginate(5);
            $check = 'fivestar';
        }elseif($this->checkfourstar){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['count_rating', 4],['review_status',1]])->latest('id')->paginate(5);
            $check = 'fourstar';
        }elseif($this->checkthreestar){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['count_rating', 3],['review_status',1]])->latest('id')->paginate(5);
            $check = 'threestar';
        }elseif($this->checktwostar){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['count_rating', 2],['review_status',1]])->latest('id')->paginate(5);
            $check = 'twostar';
        }elseif($this->checkonestar){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['count_rating', 1],['review_status',1]])->latest('id')->paginate(5);
            $check = 'onestar';
        }elseif($this->image){
            if($this->introduce){
                $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['image', '!=', null],['introduce', '!=', null],['review_status',1]])->latest('id')->paginate(5);
            }else{
                $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['image', '!=', null],['review_status',1]])->latest('id')->paginate(5);
            }
        }
        elseif($this->introduce){
                $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['introduce', '!=', null],['review_status',1]])->latest('id')->paginate(5);
        }
        else{
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1]])->latest('id')->paginate(5);
        };
        $avg = round(Review::where([['product_id', $this->product->id],['review_status',1], ['review_parent', null]])->avg('count_rating'),1);
        $rating_avg = round(Review::where([['product_id', $this->product->id],['review_status',1], ['review_parent', null]])->avg('count_rating'));
        $introduce_review = count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['introduce',1]])->get());
        $all_count_review = count(Review::where([['product_id', $this->product->id],['review_status',1], ['review_parent',null]])->get());
        if($all_count_review==0){
            $all_count_review = 1;
        }
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s');
        $order =  Order::where([['user_id', $this->userLoginId],['shipping_status',2]])->get();
        $bought = 0;
        $count_buy = 0;
        $new_purchase = 0;
        $order_buy = '';
        foreach($order as $key => $or){
            if($or->created_at->adddays(30) > $now){
            $count_product_buy = count(OrderDetail::where([['product_id',$this->product->id],['order_id', $or->id]])->get());
                foreach($or->products as $pro){
                    if($this->product->id == $pro->id){
                        $order_details = OrderDetail::where([['product_id',$this->product->id],['order_id', $or->id]])->first();
                        $order_buy = Order::find($order_details->order_id);
                        $reviews  = Review::where([['product_id',$this->product->id],['customer_id', $this->userLoginId],['review_parent',null]])->get();
                        if(count($reviews)==0){
                            $bought = 1;
                         }
                    }
                } 
                $count_buy += $count_product_buy;
                
            }
      
        }
        $count_old =  Review::where([['product_id',$this->product->id],['customer_id', $this->userLoginId],['review_parent',null]])->first();
        if($count_old){
           $count_buy_old = $count_old->count_buy_product;
        }else{
            $count_buy_old = 0;
        }
        if($count_buy > $count_buy_old){
            $new_purchase = 1;
        }
        if($order_buy != ''){
            $time_buy = $order_buy->created_at;
        }else{
            $time_buy = '';
        }
     
        
        
        $id_user = $this->userLoginId;
        $fivestar = round(count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['count_rating',5]])->get())/$all_count_review*100);
        $fourstar = round(count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['count_rating',4]])->get())/$all_count_review*100);
        $threestar = round(count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['count_rating',3]])->get())/$all_count_review*100);
        $twostar = round(count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['count_rating',2]])->get())/$all_count_review*100);
        $onestar = round(count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['count_rating',1]])->get())/$all_count_review*100);
        $all_count_review = count(Review::where([['product_id', $this->product->id],['review_status',1], ['review_parent',null]])->get());
        $count_review_image = count(Review::where([['product_id', $this->product->id],['review_parent', null],['image', '!=', null],['review_status',1]])->latest('id')->get());
        $count_review_introduce = count(Review::where([['product_id', $this->product->id],['review_parent', null],['introduce', '!=', null],['review_status',1]])->latest('id')->get());
        return view($view)->with(compact('count_review_image','count_review_introduce','all_list_review','list_image_array','avg','rating_avg','all_count_review','all_review','check','time_buy','count_buy','new_purchase','bought','id_user','introduce_review','fivestar','fourstar','threestar','twostar','onestar'));
    }
    public function ReplyRating ($review_id, $product_id){
        if(!Auth::user()){
            return redirect('/login');
        }
        if(Auth::user()->position == 'admin'){
            Review::find($review_id)->update(['admin_feedback' => 1]);
            $review_status = 1;
        }else{
            $review_status = null;
        }
        Review::create([
            'product_id' => $product_id,
            'customer_id' => Auth::user()->id,
            'content_rating' => $this->content_rating,
            'review_parent' => $review_id,
            'review_status' => $review_status
        ]);
        if(Auth::user()->position != 'admin'){
        $this->dispatchBrowserEvent('OpenSuccess', []);
        }
        $this->emit('render');
    }
    public function useful($review_id){
        if(!Auth::user()){
            return redirect('/login');
        }
        $review = Review::find($review_id);
        $review->update([
            'useful' => $review->useful.','.Auth::user()->id
        ]);
        $this->emit('render');
    }
    public function un_useful($review_id){
        if(!Auth::user()){
            return redirect('/login');
        }
        $review = Review::find($review_id);
        $useful_array = explode(',', $review->useful);
        $useful_array = array_diff($useful_array, array(Auth::user()->id));
        $useful_array = implode(',', $useful_array);
        $review->update([
            'useful' => $useful_array
        ]);
        $this->emit('render');
    }
    public function discussion($review_id){
        $this->dispatchBrowserEvent('show_text');
        $this->class = $review_id;
        $this->emit('render');
    }
    public function remove_review_child($review_id){
        Review::find($review_id)->forceDelete();
        $this->emit('render');
    }
    public function info_buy($id){
        $this->dispatchBrowserEvent('info_buy', [
            'id' => $id,
        ]);
    }
    public function none_info_buy(){
        $this->dispatchBrowserEvent('none_info_buy');
    }
}
