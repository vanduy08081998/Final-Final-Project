<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatisticalProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
	protected $fillable = ['product_id','order_date','sales','quantity'];
	protected $primaryKey = 'id';
	protected $table = 'statistical_product_sold';
}
