<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
  use HasFactory;

  protected $table = 'products'; //Tăng bảo mật

  protected $fillable = [

    'product_name',
    'product_slug',
    'product_image',
    'product_gallery',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'product_id_category',
    'product_attribute',
    'unit_price',
    'discount',
    'shipping_type',
    'product_unit',
    'product_id_brand',
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
    'type_of_category',
    'shipping_day',
    'choice_options',
    'colors',
    'deals_today'
  ];

  public $timestamps = TRUE;

  /**
   * Get all of the variants for the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function variants()
  {
    return $this->hasMany(ProductVariant::class, 'id_product');
  }

  /**
   * Get the category that owns the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function category()
  {
    return $this->belongsTo(Category::class, 'product_id_category');
  }

  public function comments()
  {
    return $this->hasMany(Comment::class, 'comment_id_product')->latest();
  }

  public function flash_deals()
  {
    return $this->belongsToMany(FlashDeal::class, 'flash_deals_products');
  }

  public function wishlist()
  {
    return $this->belongsTo(Wishlist::class, 'id_prod');
  }

  public function orders()
  {
    return $this->belongsToMany(Order::class, 'order_details');
  }

  public function specifications()
  {
    return $this->hasMany(Specification::class);
  }
  public function reviews()
  {
    return $this->hasMany(Review::class, 'product_id')->latest();
  }

  /**
   * Get the brand that owns the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function brand()
  {
      return $this->belongsTo(Brand::class, 'product_id_brand');
  }
}
