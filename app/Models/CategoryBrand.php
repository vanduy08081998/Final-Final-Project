<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBrand extends Model
{
    use HasFactory;

    public $table = 'category_brand';

    public $fillable  = ['category_id_cate','brand_id'];



}
