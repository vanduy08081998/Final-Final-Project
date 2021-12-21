<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistical extends Model
{
    use HasFactory;
    public $timestamps = false;
	protected $fillable = ['order_date','sales','quantity','total_order'];
	protected $primaryKey = 'id';
	protected $table = 'statistical';
}
