<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comment;
use App\Models\Notification;
use Livewire\Component;
use Auth;
use Carbon\Carbon;
use App\Services\NotificationService;

class AdminComment extends Component
{
    public $value, $comment_content, $parent_id;
    public $modelId, $handle;

    // protected $listeners = ['refreshParent' => '$refresh'];
    protected $listeners = [
        'getModelId',
        'render' => 'render',
        'feedback',
        'editFeedback'
    ];
    
    public function getModelId($id, $action, $parent_id){
       if($action == 'edit'){
        $this->modelId = Comment::find($id);
        $this->comment_content = $this->modelId->comment_content;
        $this->handle = $action;
        $this->dispatchBrowserEvent('OpenEditFeedbackModal');
       }else{
        $this->modelId = Comment::find($id);
        $this->comment_content = '@'.$this->modelId->user->name. ' ';
        $this->handle = $action;
        $this->parent_id = $parent_id;
        $this->dispatchBrowserEvent('OpenStoreFeedbackModal');
       }
       
    }
    
    public function feedback($id, $parent_id)
    {
        $this->emit('getModelId', $id, 'store', $parent_id);
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
        
        $service = new NotificationService();
        $service->store(Comment::find($id)->comment_id_user, $product_id, 'comment', 'BigDeal');
        
        $this->dispatchBrowserEvent('reload');
    }

    public function editFeedback($id){
        $this->emit('getModelId', $id, 'edit', '');
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