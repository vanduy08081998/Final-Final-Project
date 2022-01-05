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
        'orderDetail',
        'render'
    ];

    public function orderDetail($id){
        $this->orderId = Order::find($id);
        $this->order_details = OrderDetail::where('order_id', $id)->get();
        $this->dispatchBrowserEvent('OpenDetailModal');
    }
  
    public function deleteOrder($id){
      Order::find($id)->update([
           'delivery_viewed' => 6
      ]);
      $this->emit('render');
    }

    public function render()
    {
        if($this->select){
            if($this->select == 'latest'){
                $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'ASC')->paginate(10);
            }else{
              
                if($this->select == 1){
                   $orders = Order::where([['delivery_viewed', $this->select], ['user_id', Auth::user()->id]])->orWhere([['delivery_viewed', null], ['user_id',                            Auth::user()->id]])->latest()->paginate(10);
                }else{
                  $orders = Order::where([['delivery_viewed', $this->select], ['user_id', Auth::user()->id]])->latest()->paginate(10);
                }
                
            }
        }else{
            $orders = Order::where('user_id', Auth::user()->id)->latest()->paginate(10);
        }
        return view('livewire.account-order', compact('orders'));
    }
}