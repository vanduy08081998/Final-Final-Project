<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    public $table = 'blogs';

    public $fillable = ['id_blogCate', 'poster', 'blog_title', 'blog_description', 'blog_image', 'blog_content', 'meta_keywords'];

    public $timestamp = true;

    public $primaryKey = 'id';

        /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blogCate()
    {
        return $this->belongsTo(BlogCate::class, 'id_blogCate');
    }

        /**
     * Get all of the billdetails for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(User::class, 'poster');
    }
}
