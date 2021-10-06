<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $table = 'variants';
    protected $fillable = ['attribute_id','name','slug'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
