<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashDeal extends Model
{
  use HasFactory;

  protected $table = 'flash_deals';
  protected $fillable = [
    'title','discount', 'banner', 'date_start','date_end', 'products'
  ];

  public $timestamps = false;

  public function products()
  {
      return $this->belongsToMany(Product::class, 'flash_deals_products');
  }
}
