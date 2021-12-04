<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;

    public $timetamps = false;
    public $fillable = ['name','gso_id','province_id'];
    protected $primary = 'id';
    protected $table = 'districts';

    public function wards(){
        return $this->hasMany(Wards::class,'district_id');
    }
}
