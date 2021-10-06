<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    protected $fillable = ['name','slug'];
    protected $primaryKey = 'id';
    public $timestamp = true;

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function variants(){
        return $this->hasMany(Variant::class);
    }
}
