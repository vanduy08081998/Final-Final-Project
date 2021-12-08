<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CommentLive extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $product, $comment_content, $userLogin, $comments;

    protected $listeners = ['render' => 'mount'];

    public function mount()
    {
        if (Auth::user()) {
            $this->userLogin = Auth::user();
        } else {
            $this->userLogin = null;
        }

        $this->comment_content = '';
    }

    public function saveReply($comment_id_product, $comment_parent_id, $comment_reply_id)
    {
        if (!$this->userLogin) {
            return redirect('/login');
        }
        if ($this->comment_content == "") {
            $user = Comment::find($comment_reply_id)->user;
            $this->comment_content = '@' . $user->name . ' ';
        }
        $data = array(
            'comment_id_product' => $comment_id_product,
            'comment_content' => $this->comment_content,
            'comment_id_user' => $this->userLogin->id,
            'comment_parent_id' => $comment_parent_id,
            'comment_reply_id' => $comment_reply_id,
        );
        Comment::create($data);
        $this->emit('render');

    }

    public function likeComment($comment_id)
    {
        if (!$this->userLogin) {
            return redirect('/login');
        }
        $commentId = Comment::find($comment_id);
        $commentId->usersLike()->attach($this->userLogin->id);
        $this->emit('render');
    }

    public function UnLikeComment($comment_id)
    {
        $commentId = Comment::find($comment_id);
        $commentId->usersLike()->detach($this->userLogin->id);
        $this->emit('render');
    }

    public function render()
    {
        $commentAll = Comment::where('comment_id_product', $this->product->id)->where('comment_parent_id', 0)->latest('id')->paginate(10);
        return view('livewire.comment-live', compact('commentAll'));
    }
}