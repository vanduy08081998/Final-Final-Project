<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::where('comment_parent_id', 0)->latest('id')->get();
        $isFeedback = Comment::where('comment_admin_feedback', 1)->latest()->get()->count();
        $noneFeedback = Comment::where('comment_admin_feedback', null)->latest()->get()->count();
        $countTrashed = Comment::onlyTrashed()->count();
        return view('admin.comments.index', compact('comments', 'countTrashed', 'isFeedback', 'noneFeedback'));
    }

    public function feedback($parent, $id)
    {
        $parentId = $parent;
        $commentId = Comment::find($id);
        return view('admin.comments.feedback', compact('commentId', 'parentId'));
    }

    public function feedbackStore(Request $request)
    {
        $commentId = Comment::find($request->comment_reply_id);
        $commentId->comment_admin_feedback = 1;
        $commentId->save();
        $data = $request->all();
        Comment::create($data);
        return redirect()->route('comment.index');
    }

    public function isfeedback()
    {
        $countTrashed = Comment::onlyTrashed()->count();
        $noneFeedback = Comment::where('comment_admin_feedback', null)->latest()->get()->count();
        $comments = Comment::where('comment_admin_feedback', 1)->latest()->get();
        return view('admin.comments.isfeedback', compact('comments', 'noneFeedback', 'countTrashed'));
    }

    public function nonefeedback()
    {
        $countTrashed = Comment::onlyTrashed()->count();
        $isFeedback = Comment::where('comment_admin_feedback', 1)->latest()->get()->count();
        $comments = Comment::where('comment_admin_feedback', null)->latest()->get();
        return view('admin.comments.nonefeedback', compact('comments', 'isFeedback', 'countTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commentId = Comment::find($id);
        return view('admin.comments.edit', compact('commentId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $commentId = Comment::find($id);
        $commentId->update($data);
        return back();
    }

    public function feedbackAll(){
        $comments = Comment::where('comment_admin_feedback', null)->latest()->get();
        return view('admin.comments.all-feedback', compact('comments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return back()->with('Xóa dữ liệu thành công');
    }

    public function trash()
    {
        $comments = Comment::onlyTrashed()->get();
        return view('admin.comments.trash', compact('comments'));
    }

    public function restore($id)
    {
        Comment::where('id', $id)->restore();
        return back()->with('message', 'Đã khôi phục dữ liệu');
    }

    public function forceDelete($id)
    {
        $commentId = Comment::find($id);
        $commentId->forceDelete();
        return back()->with('message', 'Xóa dữ liệu thành công');
    }

    public function handle(Request $request)
    {
        $data = $request->all();
        switch ($data['handle']) {
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