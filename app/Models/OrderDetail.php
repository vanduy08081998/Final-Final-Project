<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $fillable = ['order_id','product_id','specification','promotion_price', 'quantity', 'discount'];

    public $timestamps = true;

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}