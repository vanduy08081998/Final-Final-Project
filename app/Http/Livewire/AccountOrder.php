<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderDetail;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;

class AccountOrder extends Component
{
    use WithPagination;

    public $select, $order_details = [],$orderId = [];
    protected $listeners = [
        'orderDetail'
    ];

    public function orderDetail($id){
        $this->orderId = Order::find($id);
        $this->order_details = OrderDetail::where('order_id', $id)->get();
        $this->dispatchBrowserEvent('OpenDetailModal');
    }

    public function render()
    {
        if($this->select){
            if($this->select == 'latest'){
                $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'ASC')->paginate(8);
            }
        }else{
            $orders = Order::where('user_id', Auth::user()->id)->latest()->paginate(8);
        }
        return view('livewire.account-order', compact('orders'));
    }
}