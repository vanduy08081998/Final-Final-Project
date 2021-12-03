<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public $table = 'wishlist';

    public $fillable = [
        'id_user','id_prod'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_prod');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
