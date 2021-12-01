<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Services\Combinations;
use App\Services\GeneralService;
use Illuminate\Support\Facades\DB;
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
        $brands = DB::table('brands')->get();
        return view('admin.products.create', compact('brands'));
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

        if ($request->has('quantity')) {
            $quantity = $request->quantity;
        } else {
            $quantity = 0;
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
        }

        if ($request->type_of_category == 'isNotAttribute') {
            $date_of_manufacture_expiry = explode(' - ', $request->expiry);
            $date_of_manufacture = strtotime($date_of_manufacture_expiry[0]);
            $expiry = strtotime($date_of_manufacture_expiry[1]);
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

        if ($request->has('colors')) {
            $colors = json_encode($request->colors);
        } else {
            $colors = NULL;
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
            'product_attribute' => json_encode($request->attribute),
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

        $product = Product::create($data);

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
                        $str .= '-' . str_replace(' ', '', $item);
                        $sku .= '-' . str_replace(' ', '', $item);
                    } else {
                        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                            $color_name = \App\Models\Color::where('color_code', $item)->first()->color_slug;
                            $str .= $color_name;
                            $sku .= '-' . $color_name;
                        } else {
                            $str .= str_replace(' ', '', $item);
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
        return view('admin.products.update', compact('product', 'brands'));
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

        if ($request->has('quantity')) {
            $quantity = $request->quantity;
        } else {
            $quantity = 0;
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
        }

        if ($request->type_of_category == 'isNotAttribute') {
            $date_of_manufacture_expiry = explode(' - ', $request->expiry);
            $date_of_manufacture = strtotime($date_of_manufacture_expiry[0]);
            $expiry = strtotime($date_of_manufacture_expiry[1]);
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
            'product_attribute' => json_encode($request->attribute),
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
                        $str .= '-' . str_replace(' ', '', $item);
                        $sku .= '-' . str_replace(' ', '', $item);
                    } else {
                        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                            $color_name = \App\Models\Color::where('color_code', $item)->first()->color_slug;
                            $str .= $color_name;
                            $sku .= '-' . $color_name;
                        } else {
                            $str .= str_replace(' ', '', $item);
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
        Product::find($id)->delete();
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
}
