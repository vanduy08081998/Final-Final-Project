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
}
