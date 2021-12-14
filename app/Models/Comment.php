<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'comments';

    public $fillable = ['comment_id_product', 'comment_id_user', 'comment_content', 'comment_parent_id', 'comment_reply_id', 'comment_admin_feedback', 'clearance_at'];

    protected $dates = ['deleted_at'];

    public $timestamp = true;

    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'comment_id_user');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'comment_id_product');
    }

    public function reply()
    {
        return $this->hasMany(Comment::class, 'comment_parent_id');
    }

    public function usersLike()
    {
        return $this->belongsToMany(User::class, 'comment_user');
    }

    public function replyComment()
    {
        return $this->hasMany(Comment::class, 'comment_reply_id');
    }

    public function replyOne()
    {
        return $this->belongsTo(Comment::class, 'comment_reply_id');
    }

    public function replyParent()
    {
        return $this->belongsTo(Comment::class, 'comment_reply_id');
    }

    public function hasReply()
    {
        return $this->hasMany(Comment::class, 'comment_reply_id');
    }

    public function userRelfect()
    {
        return $this->belongsToMany(User::class, 'reflect');
    }

    public function userUnsatisfied()
    {
        return $this->belongsToMany(User::class, 'unsatisfied');
    }


}