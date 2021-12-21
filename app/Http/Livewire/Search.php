<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Search extends Component
{
    public $category,$item;
    public function render()
    {   $search_on ='';
        if($this->item!=''){

           $search_on = Product::where('product_name', 'LIKE', '%' . $this->item. '%')->get();
        }
        return view('livewire.search',compact('search_on'));
    }
}
