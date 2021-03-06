<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\FlashDeal;
use Illuminate\Http\Request;
use App\Models\Specification;
use App\Models\ProductVariant;
use App\Services\Combinations;
use App\Services\GeneralService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
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
    $this->middleware('permission:Thêm sản phẩm', ['only' => ['store']]);
    $this->middleware('permission:Sửa sản phẩm', ['only' => ['edit']]);
    $this->middleware('permission:Xóa sản phẩm', ['only' => ['destroy']]);

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
    $countTrashed = Product::onlyTrashed()->count();
    return view('admin.products.index', [
      'product' => $product, 'countTrashed' => $countTrashed
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $brands = DB::table('brands')->get();
    $flash_deals = FlashDeal::all();
    return view('admin.products.create', compact('brands', 'flash_deals'));
  }

  public function sku_combinations(Request $request)
  {
    $options = array();

    if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
      $colors_active = 1;
      array_push($options, $request->colors);
    } else {
      $colors_active = 0;
    }

    $product_name = $request->product_name;
    $unit_price = $request->unit_price;

    if ($request->has('choice_no')) {
      foreach ($request->choice_no as $key => $no) {
        $name = 'attribute_value_' . $no;
        $data = array();
        foreach ($request[$name] as $key => $item) {
          array_push($data, $item);
        }
        array_push($options, $data);
      }
    }

    $combinations = Combinations::makeCombinations($options);
    return view('admin.products.sku_combination', compact('combinations', 'unit_price', 'product_name', 'colors_active'));
  }

  public function sku_combinations_edit(Request $request)
  {
    $product = Product::find($request->id);
    $options = array();

    if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
      $colors_active = 1;
      array_push($options, $request->colors);
    } else {
      $colors_active = 0;
    }

    $product_name = $request->product_name;
    $unit_price = $request->unit_price;

    if ($request->has('choice_no')) {
      foreach ($request->choice_no as $key => $no) {
        $name = 'attribute_value_' . $no;
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
    return view('admin.products.sku_combination_edit', compact('combinations', 'unit_price', 'product_name', 'product', 'colors_active'));
  }

  public function getProductSpecification(Request $request){
    $productSpecification = Variant::where('attribute_id', $request->id)->get();

    $output = '';
    foreach ($productSpecification as $key => $value){
      $output.= '<option value="'.$value->name.'">'.$value->name.'</option>';
    }
    return response()->json($output);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    if ($request->shipping_type == 'flat_rate') {
      $shipping_stock = $request->shipping_stock;
    } else if ($request->shipping_type = 'free_ship') {
      $shipping_stock = 0;
    }

    if ($request->type_of_category == 'isNotAttribute') {
      $quantity = $request->quantity;
    } else {
      $quantity = $request->product_unit_quantity;
    }

    if ($request->type_of_category == 'isNotAttribute') {
      $single_sku = $request->sku;
    } else {
      $single_sku = '';
    }

    if ($request->type_of_category == 'isAttribute') {
      $single_price = $request->unit_price;
    } else if ($request->has('price')) {
      $single_price = $request->price;
    }

    if ($request->has('sale_dates')) {
      $var_date = explode(' - ', $request->sale_dates);
      $discount_start_date = strtotime($var_date[0]);
      $discount_end_date = strtotime($var_date[1]);
    }else{
      $discount_start_date = 0;
      $discount_end_date = 0;
    }

    if ($request->type_of_category == 'isNotAttribute') {
      if($request->has('expiry')){
        $date_of_manufacture_expiry = explode(' - ', $request->expiry);
        $date_of_manufacture = strtotime($date_of_manufacture_expiry[0]);
        $expiry = strtotime($date_of_manufacture_expiry[1]);
      }else{
        $date_of_manufacture = 0;
        $expiry = 0;
      }
    } else {
      $date_of_manufacture = 0;
      $expiry = 0;
    }

    if ($request->type_of_category == 'isNotAttribute') {
      $ex_link = $request->ex_link_not_attr;
    } else {
      $ex_link = $request->ex_link;
    }
    $choice_options = array();
    if ($request->has('choice_no')) {
      foreach ($request->choice_no as $key => $no) {
        $str = 'attribute_value_' . $no;

        $item['attribute_id'] = $no;

        $data = array();
        // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
        foreach ($request[$str] as $key => $eachValue) {
          // array_push($data, $eachValue->value);
          array_push($data, $eachValue);
        }

        $item['values'] = $data;
        array_push($choice_options, $item);
      }
    }

    if($request->has('attribute')){
      $attribute_column = json_encode($request->attribute);
    }else{
      $attribute_column = NULL;
    }

    if ($request->has('colors')) {
      $colors = json_encode($request->colors);
    } else {
      $colors = NULL;
    }

    if ($request->deals_today == 'on') {
      $deals_today = 1;
    } else {
      $deals_today = 0;
    }
    $flash_deal_array = array();
    $items = array();
    foreach (DB::table('flash_deals_products')->get() as $key => $val) {
      array_push($flash_deal_array, $val->product_id);
    }

    $data = [
      'product_name' => $request->product_name,
      'product_slug' => $request->product_slug,
      'product_unit' => $request->product_unit,
      'product_image' => $request->product_image,
      'product_gallery' => $request->product_gallery,
      'product_id_category' => $request->product_id_category,
      'product_id_brand' => $request->product_id_brand,
      'meta_title' => $request->meta_title,
      'meta_description' => $request->meta_description,
      'meta_keywords' => $request->meta_keywords,
      'product_attribute' =>$attribute_column,
      'unit_price' => $single_price,
      'discount' => $request->discount,
      'choice_options' => json_encode($choice_options, JSON_UNESCAPED_UNICODE),
      'shipping_type' => $request->shipping_type,
      'shipping_stock' => $shipping_stock,
      'discount_unit' => $request->discount_unit,
      'multiple_stock' => $request->multiple_stock,
      'stock_warning' => $request->stock_warning,
      'feature_product' => $request->feature_product,
      'ex_link' => $ex_link,
      'shipping_day' => $request->shipping_day,
      'vat' => $request->vat,
      'vat_unit' => $request->vat_unit,
      'sku' => $single_sku,
      'quantity' => $quantity,
      'short_description' => $request->short_description,
      'long_description' => $request->long_description,
      'show_hide_quantity' => $request->show_hide_quantity,
      'discount_start_date' => $discount_start_date,
      'discount_end_date' => $discount_end_date,
      'date_of_manufacture' => $date_of_manufacture,
      'expiry' => $expiry,
      'type_of_category' => $request->type_of_category,
      'shipping_day' => $request->shipping_day,
      'colors' => $colors,
      'deals_today' => $deals_today
    ];

    $product = Product::create($data);
    Product::find($product->id)->flash_deals()->attach($request->id_flash_deal);
    $options = array();

    if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
      $colors_active = 1;
      array_push($options, $request->colors);
    } else {
      $colors_active = 0;
    }


    if ($request->has('choice_no')) {
      foreach ($request->choice_no as $key => $no) {
        $name = 'attribute_value_' . $no;
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
    if (count($combinations[0]) > 0) {
      foreach ($combinations as $key => $combination) {
        $sku = '';

        $str = '';

        foreach ($combination as $key => $item) {
          if ($key > 0) {
            $str .= '-' . str_replace([',', '/','.',':',' ','%'], '', $item);
            $sku .= '-' . str_replace(' ', '', $item);
          } else {
            if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
              $color_name = \App\Models\Color::where('color_code', $item)->first()->color_slug;
              $str .= $color_name;
              $sku .= '-' . $color_name;
            } else {
              $str .= str_replace([',', '/','.',':',' ','%'], '', $item);
              $sku .= '-' . str_replace(' ', '', $item);
            }
          }
        }
        $product_variant = ProductVariant::where('id_product', $product->id)->where('variant', $str)->first();
        if ($product_variant == null) {
          $product_variant = new ProductVariant;
          $product_variant->id_product = $product->id;
        }

        $product_variant->variant = $str;
        $product_variant->variant_price = $request['price_' . str_replace('.', '_', $str)];
        $product_variant->sku = $request['sku_' . str_replace('.', '_', $str)];
        $product_variant->variant_quantity = $request['qty_' . str_replace('.', '_', $str)];
        $product_variant->variant_image = $request['img_' . $str];
        $product_variant->save();
      }
    }


    if ($request->has('choice_fixed_attribute')) {
      foreach($request->choice_fixed_attribute as $specification){
        $fixed_attribute = 'fixed_attribute_'.$specification;
        $specification_value = 'specifications_'.$specification;
        DB::table('specifications')->insert([
          'specifications' => $request[$fixed_attribute],
          'value' => $request[$specification_value],
          'product_id' => $product->id
        ]);
      }
    }

    Toastr::success('Thêm sản phẩm thành công', 'Chúc mừng');
    return redirect()->route('products.index');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $product = Product::find($id);
    $brands = DB::table('brands')->get();
    $flash_deals = FlashDeal::all();
    return view('admin.products.update', compact('product', 'brands', 'flash_deals'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $product = Product::find($id);
    if ($request->shipping_type == 'flat_rate') {
      $shipping_stock = $request->shipping_stock;
    } else if ($request->shipping_type = 'free_ship') {
      $shipping_stock = 0;
    }

    if ($request->type_of_category == 'isNotAttribute') {
      $quantity = $request->quantity;
    } else {
      $quantity = $request->product_unit_quantity;
    }

    if ($request->type_of_category == 'isNotAttribute') {
      $single_sku = $request->sku;
    } else {
      $single_sku = '';
    }

    if ($request->type_of_category == 'isAttribute') {
      $single_price = $request->unit_price;
    } else if ($request->has('price')) {
      $single_price = $request->price;
    }

    if ($request->has('sale_dates')) {
      $var_date = explode(' - ', $request->sale_dates);
      $discount_start_date = strtotime($var_date[0]);
      $discount_end_date = strtotime($var_date[1]);
    }else{
      $discount_start_date = 0;
      $discount_end_date = 0;
    }

    if ($request->type_of_category == 'isNotAttribute') {
      if($request->has('expiry')){
        $date_of_manufacture_expiry = explode(' - ', $request->expiry);
        $date_of_manufacture = strtotime($date_of_manufacture_expiry[0]);
        $expiry = strtotime($date_of_manufacture_expiry[1]);
      }else{
        $date_of_manufacture = 0;
        $expiry = 0;
      }
    } else {
      $date_of_manufacture = 0;
      $expiry = 0;
    }

    if ($request->type_of_category == 'isNotAttribute') {
      $ex_link = $request->ex_link_not_attr;
    } else {
      $ex_link = $request->ex_link;
    }
    $choice_options = array();
    if ($request->has('choice_no')) {
      foreach ($request->choice_no as $key => $no) {
        $str = 'attribute_value_' . $no;

        $item['attribute_id'] = $no;

        $data = array();
        // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
        foreach ($request[$str] as $key => $eachValue) {
          // array_push($data, $eachValue->value);
          array_push($data, $eachValue);
        }

        $item['values'] = $data;
        array_push($choice_options, $item);
      }
    }

    if ($request->has('attribute')) {
      $attribute_column = json_encode($request->attribute);
    } else {
      $attribute_column = NULL;
    }

    if ($request->has('colors')) {
      $colors = json_encode($request->colors);
    } else {
      $colors = NULL;
    }


    $data = [
      'product_name' => $request->product_name,
      'product_slug' => $request->product_slug,
      'product_image' => $request->product_image,
      'product_unit' => $request->product_unit,
      'product_gallery' => $request->product_gallery,
      'product_id_category' => $request->product_id_category,
      'product_id_brand' => $request->product_id_brand,
      'meta_title' => $request->meta_title,
      'meta_description' => $request->meta_description,
      'meta_keywords' => $request->meta_keywords,
      'product_attribute' => $attribute_column,
      'unit_price' => $single_price,
      'discount' => $request->discount,
      'choice_options' => json_encode($choice_options, JSON_UNESCAPED_UNICODE),
      'shipping_type' => $request->shipping_type,
      'shipping_stock' => $shipping_stock,
      'discount_unit' => $request->discount_unit,
      'multiple_stock' => $request->multiple_stock,
      'stock_warning' => $request->stock_warning,
      'feature_product' => $request->feature_product,
      'ex_link' => $ex_link,
      'shipping_day' => $request->shipping_day,
      'vat' => $request->vat,
      'vat_unit' => $request->vat_unit,
      'sku' => $single_sku,
      'quantity' => $quantity,
      'short_description' => $request->short_description,
      'long_description' => $request->long_description,
      'show_hide_quantity' => $request->show_hide_quantity,
      'discount_start_date' => $discount_start_date,
      'discount_end_date' => $discount_end_date,
      'date_of_manufacture' => $date_of_manufacture,
      'expiry' => $expiry,
      'type_of_category' => $request->type_of_category,
      'shipping_day' => $request->shipping_day,
      'colors' => $colors
    ];

    $product->update($data);
    $product->flash_deals()->sync($request->id_flash_deal);

    if($request->type_of_category == 'isNotAttribute'){

    }else{
      $options = array();
      if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
        $colors_active = 1;
        array_push($options, $request->colors);
      } else {
        $colors_active = 0;
      }
      if ($request->has('choice_no')) {
        foreach ($request->choice_no as $key => $no) {
          $name = 'attribute_value_' . $no;
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
      if (count($combinations[0]) > 0) {
        foreach ($combinations as $key => $combination) {
          $sku = '';

          $str = '';

          foreach ($combination as $key => $item) {
            if ($key > 0) {
              $str .= '-' . str_replace([',', '/', '.', ':', ' ', '%'], '', $item);
              $sku .= '-' . str_replace(' ', '', $item);
            } else {
              if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                $color_name = \App\Models\Color::where('color_code', $item)->first()->color_slug;
                $str .= $color_name;
                $sku .= '-' . $color_name;
              } else {
                $str .= str_replace([',', '/', '.', ':', ' ', '%'], '', $item);
                $sku .= '-' . str_replace(' ', '', $item);
              }
            }
          }
          $product_variant = ProductVariant::where('id_product', $product->id)->where('variant', $str)->first();
          if ($product_variant == null) {
            $product_variant = new ProductVariant;
            $product_variant->id_product = $product->id;
          }

          if (isset($request['price_' . str_replace('.', '_', $str)])) {

            $product_variant->variant = $str;
            $product_variant->variant_price = $request['price_' . str_replace('.', '_', $str)];
            $product_variant->sku = $request['sku_' . str_replace('.', '_', $str)];
            $product_variant->variant_quantity = $request['qty_' . str_replace('.', '_', $str)];
            $product_variant->variant_image = $request['img_' . str_replace('.', '_', $str)];

            $product_variant->save();
          }
        }
      } else {
        $product_variant              = new ProductVariant;
        $product_variant->id_product  = $product->id;
        $product_variant->variant     = '';
        $product_variant->variant_price       = $request->unit_price;
        $product_variant->sku         = $request->sku;
        $product_variant->variant_quantity         = $request->current_stock;
        $product_variant->save();
      }
    }


    $array_fixed_attr = [];


    if($request->has('choice_fixed_attribute')){
      foreach($request->choice_fixed_attribute as $specification){
        $specification_tb = Specification::where('product_id', $product->id)->where('specifications', Attribute::where('id',$specification)->first()->name)->first();
        if($specification_tb != null){
          $fixed_attribute = 'fixed_attribute_'.$specification;
          $specification_value = 'specifications_'.$specification;
          $specification_tb->specifications = $request[$fixed_attribute];
          $specification_tb->value = $request[$specification_value];
          $specification_tb->save();
        }else{
          $fixed_attribute = 'fixed_attribute_'.$specification;
          $specification_value = 'specifications_'.$specification;
          DB::table('specifications')->insert([
            'specifications' => $request[$fixed_attribute],
            'value' => $request[$specification_value],
            'product_id' => $product->id
          ]);
        }
        array_push($array_fixed_attr,Attribute::where('id',$specification)->first()->name);
        Specification::where('product_id', $product->id)->whereNotIn('specifications',$array_fixed_attr)->delete();
      }
    }
    Toastr::success('Cập nhật phẩm thành công', 'Chúc mừng');
    return redirect()->route('products.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $product = Product::find($id);

    if($product->variants != null){
      foreach ($product->variants() as $key => $variant) {
        $variant->delete();
      }
    }else{

    }

    $array_flash = [];
    if($product->flash_deals != null){
      foreach ($product->flash_deals as $key => $flash_deals) {
        array_push($array_flash, $flash_deals->id);

      }
      $product->flash_deals()->detach($array_flash);
    }else{

    }


    if(count(Cart::where('product_id', $product->id)->get()) > 0){
      Toastr::error('Sản phẩm đang còn trong giỏ hàng, không thể xóa', 'Rất tiếc');
    }

    if(DB::table('order_details')->where('product_id', $product->id)->get() != null){
      Toastr::error('Thất bại', 'Rất tiếc');
    }

    $product->delete();
    Toastr::success('Xóa sản phẩm thành công','Chúc mừng');
    return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
  }

  public function getProductAttributes(Request $request)
  {
    $category = Category::find($request->id);
    return response()->json($category->attributes);
  }


  public function productVariants(Request $request)
  {
    $attribute = Attribute::find($request->id);

    $output = '';

    foreach ($attribute->variants()->get() as $obj) {
      $output .= '<option value="' . $obj->name . '" >' . $obj->name . '</option>';
    }

    return response()->json($output);
  }

  public function editProductFeature(Request $request)
  {
    $product = Product::find($request->id);
    $product->update([
      'feature_product' => $request->value
    ]);
  }

  public function editDealsToday(Request $request)
  {
    $product = Product::find($request->id);
    $product->update([
      'deals_today' => $request->value
    ]);
  }

  public function productWarehouse(Product $product)
  {
    return view('admin.products.productWarehouse', compact('product'));
  }

  public function producEditWarehouse($id, Request $request)
  {
    $variant = ProductVariant::find($id);
    $variant->update([
      'variant_quantity' => $variant->variant_quantity + $request->variant_quantity
    ]);
    Toastr::success('Nhập kho thành công', 'Chúc mừng');
    return redirect()->back();
  }

  public function producEditQuantity($id, Request $request)
  {
    $product = Product::find($id);
    $product->update([
      'quantity' => $product->quantity + $request->quantity
    ]);

    Toastr::success('Nhập kho thành công', 'Chúc mừng');
    return redirect()->back();
  }

  public function inventory(){
    $products = Product::all();
    return view('admin.products.Inventory', compact('products'));
  }

  public function trash()
    {
        $product = Product::onlyTrashed()->get();
        return view('admin.products.trash', compact('product'));
    }

    public function delete($id){
       Product::find($id)->delete();
       return back()->with('message', 'Đã đẩy vào thùng rác');
    }

  public function handle(Request $request)
    {
        $data = $request->all();
        switch ($data['handle']) {
            case 'trash':
                $ids = $data['checkItem'];
                Product::whereIn('id', $ids)->delete();
                return redirect()->back();
                break;
            case 'delete':
                $ids = $data['checkItem'];
                Product::whereIn('id', $ids)->forceDelete();
                return redirect()->back();
                break;
            case 'restore':
                $ids = $data['checkItem'];
                Product::whereIn('id', $ids)->restore();
                return redirect()->back();
                break;
            default:
                # code...
                break;
        }
    }
}