<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id','shipping_address','shipping_status','payment_type', 'payment_status', 'payment_details',
     'grand_total', 'coupondiscount', 'code', 'date', 'viewed', 'delivery_viewed', 'commission_calculated', 'seller_id'];

    public $timestamp = true;

    public function products()
  {
    return $this->belongsToMany(Product::class, 'order_details')->withPivot('specification','quantity', 'promotion_price','discount');;
  }
}