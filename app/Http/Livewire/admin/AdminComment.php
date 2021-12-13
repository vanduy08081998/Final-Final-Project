<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;
use Auth;
use Carbon\Carbon;

class AdminComment extends Component
{
    public $value, $comment_content, $parent_id;
    public $modelId, $handle;

    // protected $listeners = ['refreshParent' => '$refresh'];
    protected $listeners = [
        'getModelId',
        'render' => 'render'
    ];
    
    public function getModelId($id, $action){
       if($action == 'edit'){
        $this->modelId = Comment::find($id);
        $this->comment_content = $this->modelId->comment_content;
        $this->handle = $action;
        $this->dispatchBrowserEvent('OpenEditFeedbackModal');
       }else
       {
        $this->modelId = Comment::find($id);
        $this->comment_content = '@'.$this->modelId->user->name. ' ';
        $this->handle = $action;
        $this->dispatchBrowserEvent('OpenStoreFeedbackModal');
       }
       
    }
    
    public function feedback($id)
    {
        $this->emit('getModelId', $id, 'store');
    }

    public function storeFeedback($product_id, $parent_comment_id, $id)
    {
        $data = array(
            'comment_id_product' => $product_id,
            'comment_content' => $this->comment_content,
            'comment_id_user' => Auth::user()->id,
            'comment_parent_id' => $parent_comment_id,
            'comment_reply_id' => $id,
            'clearance_at' => Carbon::now(),
            'comment_admin_feedback' => 1
        );
        Comment::create($data);
        
        Comment::find($id)->update([
            'comment_admin_feedback' => 1
        ]);

        $this->dispatchBrowserEvent('CloseModal', [
            'nameModal' => 'StoreFeedbackModal'
        ]);
        $this->dispatchBrowserEvent('reload');
    }

    public function editFeedback($id){
        $this->emit('getModelId', $id, 'edit');
    }


    public function updateFeedback($id){
        
        Comment::find($id)->update([
            'comment_content' => $this->comment_content
        ]);
        $this->dispatchBrowserEvent('reload');
    }

    public function close_modal($action)
    {
        if($action == 'edit'){
            $this->dispatchBrowserEvent('CloseModal', [
                'nameModal' => 'EditFeedbackModal'
            ]);
        }else{
            $this->dispatchBrowserEvent('CloseModal', [
                'nameModal' => 'StoreFeedbackModal'
            ]);
        }
        
    }

    public function render()
    {
        return view('livewire.admin.admin-comment');
    }
}