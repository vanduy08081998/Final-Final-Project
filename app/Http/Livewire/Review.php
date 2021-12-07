<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Review extends Component
{
    public $product, $review_content, $count_rating;
    public function add_review(){
      $this->dispatchBrowserEvent('OpenNewReviewModal', [

      ]);
    }

    public function close_review(){
        $this->dispatchBrowserEvent('CloseNewReviewModal');
    }
    public function new_review($product_id){
        dd($this->count_rating);
    }
    public function render()
    {
        return view('livewire.review');
    }
}
