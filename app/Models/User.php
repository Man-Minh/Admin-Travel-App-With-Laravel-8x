<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // update

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'sdt',
        'img',
        'password',
        'sdt',
        'status_email',
        'status_sdt',
        'remember_token',
        'token',
        'isAdmin',
        'status',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     // localScope
     public function scopeSearchUser($query)
     {
         if($key = request()->key) {
             $query = $query->where('name','like','%'.$key.'%');
         }
         else if($key1 = request()->keyfilterDesc) {
             $query = $query->orderBy($key1 , 'DESC');
         }
         else  {
             $query = $query;
         }
         return $query;
     }
}
