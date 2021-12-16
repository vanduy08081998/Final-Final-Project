<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Livewire\Component;

class Notifica extends Component
{
    public $comment, $review, $order;
    protected $listeners = [
        'render' => 'render',
    ];

    // public function mount(){
    //     $this->models = Notification::where('id_user', Auth::user()->id)->latest()->get();
    // }

    // public function comment(){
    //     $this->models = Notification::where('type', 'comment')->latest()->get();
    // }

    // public function order(){
    //     $this->models = Notification::where('type', 'order')->latest()->get();
    // }

    public function delete($id){
        $model = Notification::find($id);
        $model->delete();
        $this->emit('render');
    }
    
    public function render()
    {
        $check = '';
        if($this->comment){
            $check = $this->comment;
            $models = Notification::where([['id_user', Auth::user()->id],['type', $this->comment]])->latest()->get();
        }
        elseif($this->order){
            $check = $this->order;
            $models = Notification::where([['id_user', Auth::user()->id],['type', $this->order]])->latest()->get();
        }
        elseif($this->review){
            $check = $this->review;
            $models = Notification::where([['id_user', Auth::user()->id],['type', $this->review]])->latest()->get();
        }
        else{
            $models = Notification::where('id_user', Auth::user()->id)->latest()->get();
        }
        return view('livewire.notifica', compact('models', 'check'));
    }
}