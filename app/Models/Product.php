<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; //Tăng bảo mật

    protected $fillable = [

        'product_name','product_slug','product_image','meta_title','meta_description','meta_keywords'

    ];

    public $timestamps = TRUE;
}
