<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public $table = 'categories';

    public $fillable = ['category_name', 'category_slug', 'category_parent_id', 'meta_keywords', 'meta_title', 'meta_desc'];

    public $timestamp = true;

    public $primaryKey = 'id_cate';

    public function subcategory()
    {
        return $this->hasMany(\App\Models\Category::class, 'category_parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_parent_id');
    }

    /**
     * The brand that belong to the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'category_brand');
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class);
    }

    /**
     * Get all of the products for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
