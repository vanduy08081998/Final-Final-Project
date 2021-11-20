<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discount'; //Tăng bảo mật

    protected $fillable = [

        'discount_code', 'discount_deduct', 'discount_start', 'discount_end',
        'discount_title', 'discount_limit', 'discount_feature',

    ];

    public $timestamps = false;
}