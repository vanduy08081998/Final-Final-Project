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
        'unit_price' => $request->unit_price
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
        return redirect()->back()->with('message', 'Xóa thành công');
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
