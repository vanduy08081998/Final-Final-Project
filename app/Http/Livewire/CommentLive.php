<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentLive extends Component
{
    public $product, $comment_content;
    
    protected $listeners = ['render' => 'mount'];
    
    public function mount(){
        $this->comment_content = '';
    }

    public function saveParentComment($comment_id_product){
        $data = array(
            'comment_id_product' => $comment_id_product,
            'comment_content' => $this->comment_content,
            'comment_id_user' => Auth::user()->id,
            'comment_parent_id' => 0
        );
        
        Comment::create($data);
        $this->emit('render');
    }

    public function saveReply($comment_id_product, $comment_parent_id, $comment_reply_id){
        $data = array(
            'comment_id_product' => $comment_id_product,
            'comment_content' => $this->comment_content,
            'comment_id_user' => Auth::user()->id,
            'comment_parent_id' => $comment_parent_id,
            'comment_reply_id' => $comment_reply_id
        );
        Comment::create($data);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.comment-live');
    }
}