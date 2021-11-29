<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $table = 'comments';

    public $fillable = ['comment_id_product', 'comment_id_user','comment_content', 'comment_parent_id'];

    public $timestamp = true;

    public $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class, 'comment_id_user');
    }

    public function products(){
        return $this->belongsTo(Product::class, 'comment_id_product');
    }

    public function reply(){
        return $this->hasMany(Comment::class, 'comment_parent_id');
    }
}