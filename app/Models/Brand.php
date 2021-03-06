<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'brands';

    public $fillable = ['brand_name', 'brand_slug', 'brand_image','meta_keywords','meta_title','meta_desc'];

    protected $dates = ['deleted_at'];

    public $timestamps = false;

    public $primaryKey = 'id';

   /**
    * The categories that belong to the Brand
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
   public function categories()
   {
       return $this->belongsToMany(Category::class, 'category_brand');
   }

   /**
    * Get all of the products for the Brand
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function products()
   {
       return $this->hasMany(Product::class, 'product_id_brand');
   }
}
