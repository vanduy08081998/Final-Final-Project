<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashDealProduct extends Model
{
    use HasFactory;

    protected $table = 'flash_deals_products';

    protected $fillable = ['flash_deal_id','product_id'];
}
