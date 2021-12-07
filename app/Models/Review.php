<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = ['product_id','customer_id','count_rating','image','content_rating','introduce','review_status','review_parent'];
    protected $primaryKey = 'id';
    protected $table = 'review';

}
