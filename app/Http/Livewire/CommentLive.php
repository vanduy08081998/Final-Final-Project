<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentLive extends Component
{
    public $product, $comment_content, $showForm = [];
    
    protected $listeners = ['render' => 'mount'];
    
    public function mount(){
        $this->comment_content = '';
        // dd(Auth::user()->name);
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

    public function saveReplyComment($comment_id_product, $comment_parent_id, $comment_reply_id){
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

    public function saveRepToReply($comment_id_product, $comment_parent_id, $comment_reply_id){
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

    public function saveReplyLast($comment_id_product, $comment_parent_id, $comment_reply_id){
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

    public function replyComment($id){
        $this->comment_content = $id;
    }

    public function commentShowForm($id_comment){
       $this->showForm = true;
    }

    public function render()
    {
        return view('livewire.comment-live');
    }
}