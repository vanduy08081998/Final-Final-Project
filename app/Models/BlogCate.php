<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCate extends Model
{
    use HasFactory;


    public $table = 'blog_category';

    public $fillable = ['blogCate_name', 'blogCate_slug', 'meta_keywords', 'meta_title', 'meta_desc'];

    public $timestamp = false;

    public $primaryKey = 'id';

    /**
     * Get all of the products for the blogCate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
