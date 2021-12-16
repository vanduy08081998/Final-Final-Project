<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notification';
    public $fillable = ['id_user', 'id_type', 'type', 'content'];
    public $timestamp = true;

    public function product(){
        return $this->belongsTo(Product::class, 'id_type');
    }
}