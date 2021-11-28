<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LamaLama\Wishlist\HasWishlists;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens , SoftDeletes;
    use HasWishlists;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'email',
        'password',
        'tax_license',
        'tax_license_image',
        'commercial_license',
        'commercial_license_image',
        'country',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];


    // public static $cast = [
    //     'first_name' => 'required|unique:news',
    //     'last_name' => 'required',
    //     'company_name' => 'required',
    //     'email' => 'required',
    //     'slug' => 'required',
    // ];

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }
}
