<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;

    protected $table = 'specifications';
    protected $fillable = [
        'specifications' , 'value', 'product_id'
    ];

    public $timestamps = false;

    public function product()
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
}
