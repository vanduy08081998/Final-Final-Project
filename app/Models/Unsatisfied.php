<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unsatisfied extends Model
{
    use HasFactory;
    public $table = 'unsatisfied';

    public $fillable = ['comment_id', 'user_id'];
}