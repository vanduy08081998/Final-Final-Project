<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Livewire\Component;
use Livewire\WithPagination;


class Notifica extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $comment, $review, $order;
    protected $listeners = [
        'render' => 'render',
        'deleted',
        'deleteAll'
    ];

    public function deleted($id){
        $model = Notification::find($id);
        $model->delete();
        $this->emit('render');
    }

    public function deleteAll($type)
    {
         if($type){
            Notification::where([['id_user', Auth::user()->id],['type', $type]])->delete();
         }else{
            Notification::where('id_user', Auth::user()->id)->delete();
         }
         $this->emit('render');
    }
    
    public function render()
    {
        $check = '';
        if($this->comment){
            $check = $this->comment;
            $models = Notification::where([['id_user', Auth::user()->id],['type', $this->comment]])->latest()->paginate(5);
        }
        elseif($this->order){
            $check = $this->order;
            $models = Notification::where([['id_user', Auth::user()->id],['type', $this->order]])->latest()->paginate(5);
        }
        elseif($this->review){
            $check = $this->review;
            $models = Notification::where([['id_user', Auth::user()->id],['type', $this->review]])->latest()->paginate(5);
        }
        else{
            $models = Notification::where('id_user', Auth::user()->id)->latest()->paginate(5);
        }
        return view('livewire.notifica', compact('models', 'check'));
    }
}