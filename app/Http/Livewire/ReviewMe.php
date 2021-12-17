<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Livewire\Component;

class ReviewMe extends Component
{
    public $comment, $review, $order;
    protected $listeners = [
        'render' => 'render',
    ];

    public function delete($id){

    }

    public function deleteAll($type)
    {

    }
    
    public function render()
    {
        $check = '';
        if($this->comment){
            $check = $this->comment;
            $models = Review::where([['id_user', Auth::user()->id],['type', $this->comment]])->latest()->get();
        }
        elseif($this->order){
            $check = $this->order;
            $models = Review::where([['id_user', Auth::user()->id],['type', $this->order]])->latest()->get();
        }
        elseif($this->review){
            $check = $this->review;
            $models = Review::where([['id_user', Auth::user()->id],['type', $this->review]])->latest()->get();
        }
        else{
            $models = Review::where('customer_id', Auth::user()->id)->latest()->get();
        }
        return view('livewire.review-me', compact('models', 'check'));
    }
}
