<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;

    public $timetamps = false;
    public $fillable = ['name','gos_id'];
    protected $primary = 'id';
    protected $table = 'provinces';

    public function districts(){
        return $this->hasMany(Districts::class,'province_id');
    }
}
