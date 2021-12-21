<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('permission:Duyệt bình luận', ['only' => ['clearance']]);
        $this->middleware('permission:Sửa bình luận', ['only' => ['update']]);
        $this->middleware('permission:Xóa bình luận', ['only' => ['delete']]);
    }
    public function index()
    {
       $products = Product::latest()->get();
       return view('admin.comment-review.index', compact('products'));
    }

    public function productComment($id)
    {
       $product = Product::find($id);
       $countComment = Comment::where([['clearance_at', null], ['comment_id_product', $id]])->get()->count();
       $countTrashed = Comment::where('comment_id_product', $id)->onlyTrashed()->count();
       $countA = Comment::where([['clearance_at', '!=', null],['comment_id_product', $id],['comment_admin_feedback', null]])->get()->count();
       return view('admin.comment-review.comments.index', compact('product', 'countTrashed','countComment', 'countA'));
    }
    

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $commentId = Comment::find($id);
        $commentId->update($data);
        return back();
    }

  
    public function delete($id)
    {
        Comment::find($id)->delete();
        return back()->with('message', 'Đã chuyển vào thùng rác');
    }

    public function trash($id_product)
    {
        $comments = Comment::where('comment_id_product', $id_product)->onlyTrashed()->get();
        $product = Product::find($id_product);
        return view('admin.comment-review.comments.trash', compact('comments', 'product'));
    }

    public function restore($id)
    {
        Comment::where('id', $id)->restore();
        return back()->with('message', 'Đã khôi phục dữ liệu');
    }

    public function forceDelete($id)
    {
        Comment::onlyTrashed()->find($id)->forceDelete();
        return back()->with('message', 'Xóa dữ liệu thành công');
    }

    public function listClearance($id_product)
    {
       $product = Product::find($id_product);
       $comments = Comment::where([['clearance_at', null], ['comment_id_product', $id_product]])->get();
       return view('admin.comment-review.comments.list-clearance', compact('product', 'comments'));
    }

    public function clearance($id){
        Comment::find($id)->update([
            'clearance_at' => Carbon::now()
        ]);
        return back()->with('message', 'Đã duyệt bình luận');
    }

    // danh sách chờ phản hồi
    public function answered($id_product)
    {
       $product = Product::find($id_product);
       $comments = Comment::where([['clearance_at', '!=', null],['comment_id_product', $id_product],['comment_parent_id', 0]])->get();
       return view('admin.comment-review.comments.not-answered-comment', compact('product', 'comments'));
    }

    public function unsatisfied(){
        $userAdmin = User::where('position', 'admin')->get();
        return view('admin.comment-review.comments.unsatisfied', compact('userAdmin'));
    }

    public function handle(Request $request)
    {
        $data = $request->all();
        switch ($data['handle']) {
            case 'clearance':
                $ids = $data['checkItem'];
                Comment::whereIn('id', $ids)->update([
                    'clearance_at' => Carbon::now('Asia/Ho_Chi_Minh')
                ]);
                return redirect()->back();
                break;
            case 'trash':
                $ids = $data['checkItem'];
                Comment::whereIn('id', $ids)->delete();
                return redirect()->back();
                break;
            case 'delete':
                $ids = $data['checkItem'];
                Comment::whereIn('id', $ids)->forceDelete();
                return redirect()->back();
                break;

            case 'restore':
                $ids = $data['checkItem'];
                Comment::whereIn('id', $ids)->restore();
                return redirect()->back();
                break;
            case 'restore-all':
                $ids = Comment::onlyTrashed()->pluck('id')->all();
                Comment::whereIn('id', $ids)->restore();
                break;
            case 'delete-all':
                $ids = Comment::onlyTrashed()->pluck('id')->all();
                Comment::whereIn('id', $ids)->forceDelete();
                break;
            case 'trash-all':
                $ids = Comment::pluck('id')->all();
                Comment::whereIn('id', $ids)->delete();
                break;
            default:
                # code...
                break;
        }
    }
}