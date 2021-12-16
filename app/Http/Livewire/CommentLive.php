<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\CommentUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use DB;
use App\Services\NotificationService;

class CommentLive extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $product, $comment_content, $idUser, $search, $userLogin, $selectComment;

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
        // Gửi thông báo đến người được trả lời
        $service = new NotificationService();
        $service->store(Comment::find($comment_reply_id)->comment_id_user, $this->product->id, 'comment', Auth::user()->name);
        // Nếu người phản hồi là admin thì chuyển trạng thái của comment này thành đã được phản hồi.
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

    // Thu hồi bình luận
    public function recall($id)
    {
       Comment::find($id)->delete();
       $this->emit('render');
    }

    // Phản hồi không hài lòng
    public function unsatisfied($comment_id)
    {
        $this->emit('login');
        $commentId = Comment::find($comment_id);
        $commentId->usersLike()->detach($this->idUser);
        $commentId->userUnsatisfied()->attach($this->idUser);
        $this->emit('render');
    }

    public function render()
    {
        if($this->search)
        {
            if($this->selectComment){
                switch ($this->selectComment) {
                    case 'lastComment':
                        $commentAll = Comment::where([['comment_id_product', $this->product->id], ['comment_parent_id', 0], ['clearance_at', '!=', null],  ['comment_content','LIKE','%'.$this->search.'%']])->orderBy('id', 'ASC')->paginate(10);
                        break;
                    case 'likeComment':
                        $like = DB::table('comment_user')
                                    ->select('comment_id', DB::raw('count(*) as total'))
                                    ->groupBy('comment_id')
                                    ->orderBy('total', 'DESC')
                                    ->pluck('comment_id')
                                    ->all();
                        $commentAll = Comment::whereIn('id', $like)->orderByRaw(\DB::raw("FIELD(id, ".implode(",",$like).")"))->where([['comment_id_product', $this->product->id], ['comment_parent_id', 0], ['clearance_at', '!=', null],  ['comment_content','LIKE','%'.$this->search.'%']])->paginate(10);
                        break;
                    default:
                        # code...
                        break;
                }
            }else{
                $commentAll = Comment::where([['comment_id_product', $this->product->id], ['comment_parent_id', 0], ['clearance_at', '!=', null], ['comment_content','LIKE','%'.$this->search.'%']])->latest('id')->paginate(10);
            }
        }
        elseif($this->selectComment)
        {
            switch ($this->selectComment) {
                case 'lastComment':
                    $commentAll = Comment::where([['comment_id_product', $this->product->id], ['comment_parent_id', 0], ['clearance_at', '!=', null]])->orderBy('id', 'ASC')->paginate(10);
                    break;
                case 'likeComment':
                    $like = DB::table('comment_user')
                                ->select('comment_id', DB::raw('count(*) as total'))
                                ->groupBy('comment_id')
                                ->orderBy('total', 'DESC')
                                ->pluck('comment_id')
                                ->all();
                    $commentAll = Comment::whereIn('id', $like)->orderByRaw(\DB::raw("FIELD(id, ".implode(",",$like).")"))->where([['comment_id_product', $this->product->id], ['comment_parent_id', 0], ['clearance_at', '!=', null]])->paginate(10);
                    break;
                default:
                    # code...
                    break;
            }
        }
        else
        {
            $commentAll = Comment::where([['comment_id_product', $this->product->id], ['comment_parent_id', 0], ['clearance_at', '!=', null]])->latest('id')->paginate(10);
        }
        return view('livewire.comment-live', compact('commentAll'));
    }
}