<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashDeal extends Model
{
  use HasFactory;

  protected $table = 'flash_deals';
  protected $fillable = [
    'title', 'banner', 'date', 'products'
  ];

  public $timestamps = false;
}
