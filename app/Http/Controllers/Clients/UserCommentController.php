<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCommentController extends Controller
{
    public function saveComment($product_id, Request $request)
    {
        if (!Auth::user()) {
            return redirect('/login');
        }
        $data = array(
            'comment_id_product' => $product_id,
            'comment_content' => $request->comment_content,
            'comment_id_user' => Auth::user()->id,
            'comment_parent_id' => 0,
        );
        Comment::create($data);
        return response('Thành công');
    }

    public function editComment($id, Request $request)
    {
        $commentId = Comment::find($id);
        $commentId->comment_content = $request->comment_content;
        $commentId->save();
        return response('Thành công');
    }

    public function recall($id)
    {
        Comment::find($id)->delete();
        return response('Thành công');
    }
}