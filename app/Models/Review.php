<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = true;
    public $fillable = ['product_id','customer_id','count_rating','image','content_rating','introduce','useful','admin_feedback','review_status','review_eye','review_parent','count_buy_product','time_buy'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    protected $table = 'review';
    

    public function user(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function review_child(){
        return $this->hasMany(Review::class, 'review_parent')->latest();
    }

}