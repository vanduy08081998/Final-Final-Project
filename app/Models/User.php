<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;// add soft delete

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;
    use HasRoles;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'provider_id',
        'avatar',
        'phone',
        'gender',
        'birthday',
        'province_id',
        'district_id',
        'ward_id',
        'neighbor',
        'position',
        'password',
        'user_status'
    ];

     /**
     * Get all of the blogs for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function comments(){
        return $this->hasMany(Comment::class, 'comment_id_user');
    }

    public function likeComments(){
        return $this->belongsToMany(Comment::class, 'comment_user');
    }

    public function province(){
        return $this->hasOne(Provinces::class,'id', 'province_id');
    }
    public function district(){
        return $this->hasOne(Districts::class, 'id', 'district_id');
    }
    public function ward(){
        return $this->hasOne(Wards::class, 'id', 'ward_id');
    }


    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'id_user');
    }


    public function notification(){
        return $this->hasMany(Notification::class, 'id_user');
    }

    public function unsatisfied(){
        return $this->hasMany(Unsatisfied::class, 'user_id');
    }

}
