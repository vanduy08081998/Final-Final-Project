<?php

namespace App\Http\Livewire;
use App\Models\Review;
use App\Models\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Reviews extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $product, $review_content, $count_rating, $userLoginId, $content_rating, $sort, $introduce, $image;
    public $checkfivestar, $checkfourstar, $checkthreestar, $checktwostar, $checkonestar;
    public $search;
    protected $listeners = [  'review_introduce','review_filterstar','review_filterstar','review_image','render' => 'mount'];

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
        $check = '';
        if($this->search){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1],['content_rating','LIKE','%'.$this->search.'%']])->latest('id')->paginate(2);
        }
        elseif($this->sort){
            // dd($this->sort);
            switch($this->sort){
                case 'Mới nhất':
                    $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1]])->latest('id')->paginate(2);
                    break;
                case 'Hữu ích':
                    $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1]])->orderby('useful', 'DESC')->paginate(2);
                    break;
                case 'Đánh giá cao':
                    $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1]])->orderby('count_rating', 'DESC')->paginate(2);
                    break;
                case 'Đánh giá thấp':
                    $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1]])->orderby('count_rating', 'ASC')->paginate(2);
                break;
                case 'review_image':
                    if($this->introduce){
                        $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['image', '!=', null],['introduce', '!=', null],['review_status',1]])->latest('id')->paginate(2);
                    }else{
                        $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['image', '!=', null],['review_status',1]])->latest('id')->paginate(2);
                    }
                break;

                default :
                   
                    break;
            }
        }elseif($this->checkfivestar){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['count_rating', 5],['review_status',1]])->latest('id')->paginate(2);
            $check = 'fivestar';
        }elseif($this->checkfourstar){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['count_rating', 4],['review_status',1]])->latest('id')->paginate(2);
            $check = 'fourstar';
        }elseif($this->checkthreestar){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['count_rating', 3],['review_status',1]])->latest('id')->paginate(2);
            $check = 'threestar';
        }elseif($this->checktwostar){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['count_rating', 2],['review_status',1]])->latest('id')->paginate(2);
            $check = 'twostar';
        }elseif($this->checkonestar){
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['count_rating', 1],['review_status',1]])->latest('id')->paginate(2);
            $check = 'onestar';
        }elseif($this->image){
            if($this->introduce){
                $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['image', '!=', null],['introduce', '!=', null],['review_status',1]])->latest('id')->paginate(2);
            }else{
                $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['image', '!=', null],['review_status',1]])->latest('id')->paginate(2);
            }
        }
        elseif($this->introduce){
                $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['introduce', '!=', null],['review_status',1]])->latest('id')->paginate(2);
        }
        else{
            $all_review = Review::where([['product_id', $this->product->id],['review_parent', null],['review_status',1]])->latest('id')->paginate(2);
        };
        $avg = round(Review::where([['product_id', $this->product->id],['review_status',1], ['review_parent', null]])->avg('count_rating'),1);
        $rating_avg = round(Review::where([['product_id', $this->product->id],['review_status',1], ['review_parent', null]])->avg('count_rating'));
        $introduce_review = count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['introduce',1]])->get());
        $all_count_review = count(Review::where([['product_id', $this->product->id],['review_status',1], ['review_parent',null]])->get());
        if($all_count_review==0){
            $all_count_review = 1;
        }
        
        $id_review = count(Review::where([['product_id', $this->product->id],['review_parent', null],['customer_id', $this->userLoginId]])->get());
        $id_user = $this->userLoginId;
        $fivestar = round(count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['count_rating',5]])->get())/$all_count_review*100);
        $fourstar = round(count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['count_rating',4]])->get())/$all_count_review*100);
        $threestar = round(count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['count_rating',3]])->get())/$all_count_review*100);
        $twostar = round(count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['count_rating',2]])->get())/$all_count_review*100);
        $onestar = round(count(Review::where([['product_id', $this->product->id],['review_status',1],['review_parent', null],['count_rating',1]])->get())/$all_count_review*100);
        $all_count_review = count(Review::where([['product_id', $this->product->id],['review_status',1], ['review_parent',null]])->get());
        return view('livewire.reviews')->with(compact('avg','rating_avg','all_count_review','all_review','check','id_review','id_user','introduce_review','fivestar','fourstar','threestar','twostar','onestar'));
    }
    public function ReplyRating ($review_id, $product_id){
        if(!Auth::user()){
            return redirect('/login');
        }
        Review::create([
            'product_id' => $product_id,
            'customer_id' => Auth::user()->id,
            'content_rating' => $this->content_rating,
            'review_parent' => $review_id,
        ]);
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
    public function sort_review($product_id){
        switch($this->sort){
            case 'Mới nhất':
                $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['review_status',1]])->latest('id')->get();
                break;
            case 'Hữu ích':
                $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['review_status',1]])->orderby('created_at', 'DESC')->get();
                break;
            case 'Đánh giá cao':
                $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['review_status',1]])->orderby('count_rating', 'DESC')->get();
                break;
            default :
                $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['review_status',1]])->orderby('count_rating', 'ASC')->paginate(2);
                break;
        }
        $this->emit('render');
    }
    public function discussion($review_id){
        $this->dispatchBrowserEvent('show_text');
        $this->class = $review_id;
        $this->emit('render');
    }
    public function remove_review_child($review_id){
        Review::find($review_id)->delete();
        $this->emit('render');
    }
    public function review_image($product_id, $sort_image){
        if($sort_image == 'on'){
            $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['image', '!=', null],['review_status',1]])->latest('id')->get();
        }else{
            $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['image', null],['review_status',1]])->latest('id')->get();
        }
        $this->emit('render');
    }
    public function review_introduce($product_id, $sort_introduce){
        if($sort_introduce == 'on'){
            $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['introduce', '!=', null],['review_status',1]])->latest('id')->get();
        }else{
            $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['introduce', null],['review_status',1]])->latest('id')->get();
        }
        $this->emit('render');
    }
    public function review_filterstar($product_id, $sort_filterstar){
       switch ($sort_filterstar) {
              case 'all':
                $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['review_status',1]])->latest('id')->get();
              break;
              case '5':
                $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['count_rating', 5],['review_status',1]])->latest('id')->get();
              break;
              case '4':
                $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['count_rating', 4],['review_status',1]])->latest('id')->get();
              break;
              case '3':
                $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['count_rating', 3],['review_status',1]])->latest('id')->get();
              break;
              case '2':
                $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['count_rating', 2],['review_status',1]])->latest('id')->get();
              break;
              case '1':
                $this->all_review = Review::where([['product_id', $product_id],['review_parent', null],['count_rating', 1],['review_status',1]])->latest('id')->get();
              break;
           
           default:
               # code...
               break;
       }
    //    $this->emit('render');
    }
}