<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Auth;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        foreach($products as $product){
            $product->rating = round(Review::where('product_id',$product->id)->avg('count_rating'),1);
            $count = Review::where([['product_id',$product->id],['review_parent', null]])->get();
            $product->count_review = count($count);
        }
        return view('admin.comment-review.reviews.list_review', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        //
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
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function productReview($product_id){
        $product = Product::find($product_id)->first();
        $reviews = Review::where([['product_id', $product_id],['review_status',1], ['review_parent',null]])->latest()->get();
        $countTrashed = Review::where([['product_id', $product_id], ['review_parent',null]])->onlyTrashed()->count();
        $count_not_browse = Review::where([['product_id', $product_id],['review_status',null],['review_parent',null]])->get()->count();
        $count_not_feedback = Review::where([['product_id', $product_id],['admin_feedback', null],['review_parent',null]])->get()->count();
         return view('admin.comment-review.reviews.index')->with(compact('product','reviews','countTrashed','count_not_browse','count_not_feedback'));
    }
    public function delete($id)
    {
        Review::find($id)->delete();
        return back()->with('message', 'Đã chuyển vào thùng rác');
    }
    public function listBrowse($product_id)
    {
        $product = Product::find($product_id);
        $reviews = Review::where([['review_status', null], ['product_id', $product_id], ['review_parent',null]])->get();
        return view('admin.comment-review.reviews.list-browse', compact('product', 'reviews'));
    }
    public function Browse($id){
        Review::find($id)->update(['review_status' => 1]);
        return back()->with('message', 'Duyệt đánh giá thành công');
    }
    public function feedback($product_id){
        $product = Product::find($product_id);
        $reviews = Review::where([['admin_feedback', null],['product_id', $product_id],['review_parent',null]])->get();
        return view('admin.comment-review.reviews.not-answered-review', compact('product', 'reviews'));
    }
    public function trash($product_id)
    {
        $reviews = Review::where([['product_id', $product_id],['review_parent',null]])->onlyTrashed()->get();
        $product = Product::find($product_id);
        return view('admin.comment-review.reviews.trash', compact('reviews', 'product'));
    }
    
    public function restore($id)
    {
        Review::where('id', $id)->restore();
        return back()->with('message', 'Đã khôi phục dữ liệu');
    }

    public function forceDelete($id)
    {
        Review::onlyTrashed()->find($id)->forceDelete();
        return back()->with('message', 'Xóa dữ liệu thành công');
    }
    public function handle(Request $request)
    {
        $data = $request->all();
        switch ($data['handle']) {
            case 'trash':
                $ids = $data['checkItem'];
                Review::whereIn('id', $ids)->delete();
                return redirect()->back();
                break;
            case 'delete':
                $ids = $data['checkItem'];
                Review::whereIn('id', $ids)->forceDelete();
                return redirect()->back();
                break;

            case 'restore':
                $ids = $data['checkItem'];
                Review::whereIn('id', $ids)->restore();
                return redirect()->back();
                break;
            case 'restore-all':
                $ids = Review::onlyTrashed()->pluck('id')->all();
                Review::whereIn('id', $ids)->restore();
                break;
            case 'delete-all':
                $ids = Review::onlyTrashed()->pluck('id')->all();
                Review::whereIn('id', $ids)->forceDelete();
                break;
            case 'trash-all':
                $ids = Review::pluck('id')->all();
                Review::whereIn('id', $ids)->delete();
                break;
            default:
                # code...
                break;
        }
    }
    public function reply($id){
        $review = Review::find($id);
        return view('admin.comment-review.reviews.reply-review', compact('review'));
    }
}
