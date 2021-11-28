<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;


    public $table = 'banners';

    public $fillable = ['banner_name', 'banner_img', 'banner_link'];
    public $timestamp = true;
    public $primaryKey = 'id';

   /**
    * Get the user that owns the Blog
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */


        /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


}
