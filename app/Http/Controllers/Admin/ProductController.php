<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Services\Combinations;
use App\Services\GeneralService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AddProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $generalService, $path;

    public function __construct(GeneralService $generalService)
    {
        $this->path = 'frontend/img/shop/products/';
        $this->generalService = $generalService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderByDESC('id')->get();
        return view('admin.products.index', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    public function sku_combinations(Request $request)
    {
      $options = array();

      $product_name = $request->product_name;
      $unit_price = $request->unit_price;

       if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'attribute_value_'.$no;
                $data = array();


                // foreach (json_decode($request[$name][0]) as $key => $item) {
                foreach ($request[$name] as $key => $item) {
                    // array_push($data, $item->value);
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }
        // echo "<pre>";
        //   print_r($request->all());
        // echo "</pre>";
      $combinations = Combinations::makeCombinations($options);
      return view('admin.products.sku_combination', compact('combinations', 'unit_price', 'product_name'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,AddProductRequest $addProductRequest)
    {

      if($request->shipping_type == 'flat_rate'){
        $shipping_stock  = 0;
      }else if($request->shipping_type = 'free_ship'){
        $shipping_stock = $request->shipping_stock;
      }

      if($request->has('quantity')){
        $quantity = $request->quantity;
      }else{
        $quantity = 0;
      }

      if($request->has('sku')){
        $single_sku = $request->sku;
      }else{
        $single_sku = '';
      }

      if($request->has('unit_price')){
        $single_price = $request->unit_price;
      }else if($request->has('price')){
        $single_price = $request->price;
      }

      if($request->has('sale_dates')){
        $var_date = explode(' - ', $request->sale_dates);
        $discount_start_date = strtotime($var_date[0]);
        $discount_end_date = strtotime($var_date[1]);
      }

      if($request->has('expiry')){
        $date_of_manufacture_expiry = explode(' - ', $request->expiry);
        $date_of_manufacture = strtotime($date_of_manufacture_expiry[0]);
        $expiry = strtotime($date_of_manufacture_expiry[1]);
      }else{
        $date_of_manufacture = 0;
        $expiry = 0;
      }


      $data = [
        'product_name' => $request->product_name,
        'product_slug' => $request->product_slug,
        'product_image' => $request->product_image,
        'product_gallery' => $request->product_gallery,
        'product_id_category' => $request->product_id_category,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'meta_keywords' => $request->meta_keywords,
        'product_attribute' => json_encode($request->attribute),
        'unit_price' => $single_price,
        'discount' => $request->discount,
        'shipping_type' => $request->shipping_type,
        'shipping_stock' => $shipping_stock,
        'discount_unit' => $request->discount_unit,
        'multiple_stock' => $request->multiple_stock,
        'stock_warning' => $request->stock_warning,
        'feature_product' => $request->feature_product,
        'ex_link' => $request->ex_link,
        'shipping_day' => $request->shipping_day,
        'vat' => $request->vat,
        'vat_unit' => $request->vat_unit,
        'sku' => $request->sku,
        'quantity' => $request->quantity,
        'short_description' => $request->short_description,
        'long_description' => $request->long_description,
        'show_hide_quantity' => $request->show_hide_quantity,
        'discount_start_date' => $discount_start_date,
        'discount_end_date' => $discount_end_date,
        'date_of_manufacture' => $date_of_manufacture,
        'expiry' => $expiry,
        'type_of_category' => $request->type_of_category,
          'shipping_day' => $request->shipping_day
      ];

      $product = Product::create($data);

      $options = array();
      if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'attribute_value_'.$no;
                $data = array();


                // foreach (json_decode($request[$name][0]) as $key => $item) {
                foreach ($request[$name] as $key => $item) {
                    // array_push($data, $item->value);
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }
        $combinations = Combinations::makeCombinations($options);
        if(count($combinations[0]) > 0){
          foreach($combinations as $key => $combination){
            $str = '';
            foreach($combination as $key => $item){
              if($key > 0){
                $str .= '-'.str_replace(' ', '', $item);
              }else{
                $str .= str_replace(' ', '', $item);
              }
            }
            $product_variant = ProductVariant::where('id_product', $product->id)->where('variant', $str)->first();
            if($product_variant == null){
              $product_variant = new ProductVariant;
              $product_variant->id_product = $product->id;
            }

            $product_variant->variant = $str;
            $product_variant->variant_price = $request['price_'.str_replace('.', '_', $str)];
            $product_variant->sku = $request['sku_'.str_replace('.', '_', $str)];
            $product_variant->variant_quantity = $request['qty_'.str_replace('.', '_', $str)];
            $product_variant->variant_image = $request['img_'.$str];
            $product_variant->save();
          }
        }


        return redirect()->route('products.index');
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
        $product = Product::find($id);
        return view('admin.products.update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->validated();

        $data['product_image'] = $this->generalService->uploadImage($this->path, $request->product_image);

        Product::find($id)->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
    }

    public function getProductAttributes(Request $request){
      $category = Category::find($request->id);
      return response()->json($category->attributes);
    }


    public function productVariants(Request $request){
      $attribute = Attribute::find($request->id);

      $output = '';

      foreach($attribute->variants()->get() as $obj){
        $output .= '<option value="'.$obj->name.'" >'.$obj->name.'</option>';
      }

      return response()->json($output);
    }



}
