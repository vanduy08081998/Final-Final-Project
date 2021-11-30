<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentUser extends Model
{
    use HasFactory;

    public $table = 'comment_user';

    public $fillable = ['comment_id', 'user_id'];

    public $timestamp = true;

    public $primaryKey = 'id';

    
} 