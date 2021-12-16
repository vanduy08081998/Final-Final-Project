<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CommentUser extends Model
{
    use HasFactory;

    public $table = 'comment_user';

    public $fillable = ['comment_id', 'user_id'];

   public function comments(){
       return $this->hasOne(Comment::class, 'comment_id');
   }
    
} 