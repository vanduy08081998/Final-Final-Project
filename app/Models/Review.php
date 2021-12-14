<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Review extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = ['product_id','customer_id','count_rating','image','content_rating','introduce','useful','review_status','review_parent'];
    protected $primaryKey = 'id';
    protected $table = 'review';

    public function user(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function review_child(){
        return $this->hasMany(Review::class, 'review_parent')->latest();
    }

}
