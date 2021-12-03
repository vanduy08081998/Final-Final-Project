<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\CommentUser;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
class CommentLive extends Component
{
    use WithPagination;
 
    protected $paginationTheme = 'bootstrap';
    public $product, $comment_content, $userLoginId, $comments;
    
    protected $listeners = ['render' => 'mount'];

    public function mount(){
        if(Auth::user()){
          $this->userLoginId = Auth::user()->id;
        }
        else{
            $this->userLoginId = 0;
        }

        $this->comment_content = '';
       
    }

    public function saveReply($comment_id_product, $comment_parent_id, $comment_reply_id){
        if($this->userLoginId == 0){
            return redirect('/login');
        }
        if($this->comment_content == ""){
            $user = Comment::find($comment_reply_id)->user;
            $this->comment_content = '@'.$user->name.': ';
        }
        $data = array(
            'comment_id_product' => $comment_id_product,
            'comment_content' => $this->comment_content,
            'comment_id_user' => $this->userLoginId,
            'comment_parent_id' => $comment_parent_id,
            'comment_reply_id' => $comment_reply_id,
        );
        Comment::create($data);
        $this->emit('render');

    }

    public function likeComment($comment_id){
        if($this->userLoginId == 0){
            return redirect('/login');
        }
        $commentId = Comment::find($comment_id);
        $commentId->usersLike()->attach($this->userLoginId);
        $this->emit('render');
    }

    public function UnLikeComment($comment_id){
        $commentId = Comment::find($comment_id);
        $commentId->usersLike()->detach($this->userLoginId);
        $this->emit('render');
    }

    public function render()
    {
        $commentAll = Comment::where('comment_id_product', $this->product->id)->where('comment_parent_id', 0)->latest()->paginate(5);
        
        return view('livewire.comment-live', compact('commentAll'));
    }
}
