<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    public $timetamps = true;
    public $fillable = ['user_id','fullname','phone','province_id','district_id','ward_id','neighbor','address_type','default'];
    protected $primaryKey = 'id';
    protected $table = 'shipping';

    public function province(){
        return $this->hasOne(Provinces::class, 'id', 'province_id');
    }
    public function district(){
        return $this->hasOne(Districts::class, 'id', 'district_id');
    }
    public function ward(){
        return $this->hasOne(Wards::class, 'id', 'ward_id');
    }

}
