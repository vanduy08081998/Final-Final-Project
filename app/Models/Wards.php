<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;

    public $timetamps = false;
    public $fillable = ['name','gso_id','district_id'];
    protected $primary = 'id';
    protected $table = 'wards';
}
