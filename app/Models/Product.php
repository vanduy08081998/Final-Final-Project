<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; //Tăng bảo mật

    protected $fillable = [

        'product_name','product_slug','product_image','product_gallery','meta_title','meta_description','meta_keywords','product_id_category','product_attribute','unit_price','discount',
        'shipping_type' ,
        'shipping_stock',
        'discount_unit',
        'multiple_stock',
        'stock_warning',
        'feature_product',
        'sku',
        'quantity',
        'ex_link',
        'vat',
        'vat_unit',
        'short_description',
        'long_description',
        'show_hide_quantity',
        'discount_start_date',
        'discount_end_date', 
        'date_of_manufacture',
        'expiry',
        'type_of_category'
    ];

    public $timestamps = TRUE;

    /**
     * Get all of the variants for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variants()
    {
        return $this->hasMany(ProductVariant::class,'id_product');
    }

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'product_id_category');
    }
}
