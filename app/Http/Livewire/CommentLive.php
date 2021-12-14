<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class CommentLive extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $product, $comment_content, $userLogin = [], $comments, $idUser;

    protected $listeners = [
        'render' => 'mount',
        'login'
    ];


    public function login()
    {
        if (!Auth::user()) {
            return redirect('/login');
        }
    }
    
    public function mount()
    {
        if (Auth::user()) {
            $this->idUser = Auth::user()->id;
        } else {
            
            $this->idUser = 0;
        }

        $this->comment_content = '';
    }

    public function saveReply($comment_parent_id, $comment_reply_id)
    {
        $this->emit('login');
        if ($this->comment_content == "") {
            $user = Comment::find($comment_reply_id)->user;
            $this->comment_content = '@' . $user->name . ' ';
        }
        
        $data = array(
            'comment_id_product' => $this->product->id,
            'comment_content' => $this->comment_content,
            'comment_id_user' => $this->idUser,
            'comment_parent_id' => $comment_parent_id,
            'comment_reply_id' => $comment_reply_id,
            'clearance_at' => Carbon::now()
        );
        Comment::create($data);
        if(Auth::user()->position == 'admin'){
            Comment::find($comment_reply_id)->update([
                'comment_admin_feedback' => 1
            ]);
        }
        $this->emit('render');

    }

    public function likeComment($comment_id)
    {
        $this->emit('login');
        $commentId = Comment::find($comment_id);
        $commentId->usersLike()->attach($this->idUser);
        $commentId->userUnsatisfied()->detach($this->idUser);
        $this->emit('render');
    }

    public function UnLikeComment($comment_id)
    {
        $commentId = Comment::find($comment_id);
        $commentId->usersLike()->detach($this->idUser);
        $this->emit('render');
    }

    public function recall($id){
       Comment::find($id)->delete();
       $this->emit('render');
    }

    // Phản hồi không hài lòng
    public function unsatisfied($comment_id){
        $this->emit('login');
        $commentId = Comment::find($comment_id);
        $commentId->usersLike()->detach($this->idUser);
        $commentId->userUnsatisfied()->attach($this->idUser);
        $this->emit('render');
    }

    public function render()
    {
        $commentAll = Comment::where([['comment_id_product', $this->product->id], ['comment_parent_id', 0], ['clearance_at', '!=', null]])->latest('id')->paginate(10);
        return view('livewire.comment-live', compact('commentAll'));
    }
}