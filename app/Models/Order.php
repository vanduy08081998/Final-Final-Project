<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    public $timestamp = true;

    public function products()
  {
    return $this->belongsToMany(Product::class, 'order_details')->withPivot('specification','quantity', 'promotion_price','discount');;
  }
}
