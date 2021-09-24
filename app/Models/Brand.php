<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $table = 'brands';

    public $fillable = ['brand_name', 'brand_slug', 'brand_image','meta_keywords','meta_title','meta_desc'];

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


}
