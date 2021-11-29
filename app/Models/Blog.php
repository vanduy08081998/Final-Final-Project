<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    public $table = 'blogs';

    public $fillable = ['id_blogCate', 'poster', 'blog_title', 'blog_description', 'blog_image', 'blog_content', 'meta_keywords', 'blog_status'];

    public $timestamp = true;


   /**
    * Get the user that owns the Blog
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user()
   {
       return $this->belongsTo(User::class, 'poster');
   }

        /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blogCate()
    {
        return $this->belongsTo(BlogCate::class, 'id_blogCate');
    }

}
