<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
class ReviewMe extends Component
{
    use WithPagination;
    public $checkfivestar, $checkfourstar, $checkthreestar, $checktwostar, $checkonestar;
    protected $listeners = [
        'render' => 'render',
    ];

    public function delete($id){

    }

    public function deleteAll($type)
    {

    }
    public function info_buy($id){
        $this->dispatchBrowserEvent('info_buy', [
            'id' => $id,
        ]);
    }
    public function none_info_buy(){
        $this->dispatchBrowserEvent('none_info_buy');
    }
    
    public function render()
    {
        $check = '';
        if($this->checkfivestar){
        $all_review = Review::where([['review_parent', null],['count_rating', 5],['review_status',1],['customer_id', Auth::user()->id]])->latest('id')->paginate(3);
        $check = 'fivestar';
        }elseif($this->checkfourstar){
        $all_review = Review::where([['review_parent', null],['count_rating', 4],['review_status',1],['customer_id', Auth::user()->id]])->latest('id')->paginate(3);
        $check = 'fourstar';
        }elseif($this->checkthreestar){
        $all_review = Review::where([['review_parent', null],['count_rating', 3],['review_status',1],['customer_id', Auth::user()->id]])->latest('id')->paginate(3);
        $check = 'threestar';
        }elseif($this->checktwostar){
        $all_review = Review::where([['review_parent', null],['count_rating', 2],['review_status',1],['customer_id', Auth::user()->id]])->latest('id')->paginate(3);
        $check = 'twostar';
        }elseif($this->checkonestar){
        $all_review = Review::where([['review_parent', null],['count_rating', 1],['review_status',1],['customer_id', Auth::user()->id]])->latest('id')->paginate(3);
        $check = 'onestar';
        }else{
            $all_review = Review::where([['review_parent', null],['review_status',1],['customer_id', Auth::user()->id]])->latest()->paginate(3);
        }
        return view('livewire.review-me', compact('all_review', 'check'));
    }
    public function review_eye($id)
    {
       Review::find($id)->update(['review_eye'=>null]);
       $this->emit('render');
    }
    public function review_eye_slash($id)
    {
        Review::find($id)->update(['review_eye'=>1]);
        $this->emit('render');
    }
}
