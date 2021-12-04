<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;


    public $table = 'informations';

    public $fillable = ['start_time', 'end_time', 'address', 'phone', 'email', 'gg_map', 'infor_status'];

    public $timestamp = false;


}
