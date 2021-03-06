<?php

namespace App\Http\Livewire\Admin;
use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Services\NotificationService;


class ReplyReview extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $userLoginId, $review;
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

    public function render()
    {
        $review = $this->review;
        return view('livewire.admin.reply-review')->with(compact('review'));
    }
    public function ReplyRating ($review_id, $product_id){
        if($this->content_rating != ''){
            Review::find($review_id)->update(['admin_feedback' => 1]);
            Review::create([
                'product_id' => $product_id,
                'customer_id' => Auth::user()->id,
                'content_rating' => $this->content_rating,
                'review_parent' => $review_id,
                'review_status' => 1,
            ]);
    
            $reviewId = Review::find($review_id);
            
            $service = new NotificationService();
            $service->store($reviewId->customer_id , $product_id, 'review', 'BigDeal');
            $this->emit('render');
        }
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
    public function browse($review_id){
        $reviewId = Review::find($review_id);
        $service = new NotificationService();
        $reviewParent = Review::find($reviewId->review_parent);
        $service->store($reviewParent->customer_id , $reviewId->product_id, 'review', $reviewId->user->name);
        Review::find($review_id)->update(['review_status' => 1]);
        $this->emit('render');
    }
}