<?php

namespace App\Http\Controllers\Clients;
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
        $get_image = $request->file('images');
        if($get_image){
            $array_name_image = [];
            foreach($get_image as $image){
             $get_name_image = $image->getClientOriginalName();
             $name_image = current(explode('.',$get_name_image));
             $new_image = $name_image.uniqid().'.'.$image->getClientOriginalExtension();
             $image->move('uploads/Reviews/',$new_image);
             array_push($array_name_image, $new_image);
            }
            $array_name_image = implode(',', $array_name_image);
        }else{
            $array_name_image = null;
        }
        $data = array(
            'product_id'=> $request->product_id,
            'customer_id'=> Auth()->user()->id,
            'count_rating'=> $request->count_rating,
            'image'=> $array_name_image,
            'content_rating' => $request->content_rating,
            'introduce' => $request->introduce,
    
            );
        Review::create($data);
        return response('Thành công');
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
        Review::find($request->review_id)->update([
            'product_id' => $request->product_id,
            'customer_id' => Auth::user()->id,
            'content_rating' => $request->content_rating,
            'review_status' => null
        ]);
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
    public function show_review($product_slug){
        $product = Product::where('product_slug', $product_slug)->first();
         return view('clients.shop.details.show_review')->with(compact('product'));
    }
}
