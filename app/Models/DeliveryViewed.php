<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryViewed extends Model
{
    use HasFactory;
    protected $table = 'delivery_viewed'; //Tăng bảo mật

    protected $fillable = ['delivery_viewed', 'delivery_description'];

    public $timestamps = false;
}