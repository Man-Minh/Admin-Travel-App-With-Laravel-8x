<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // update

class DeXuat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'loai_dia_danh_id',
        'user_id',
        'ten_Diem',
        'ten_Goi_Khac',
        'mo_Ta',
        'kinh_Do',
        'vi_Do',
        'img',
    ];

    //Join 1-1
    public function thongTinLoaiDiaDanh()
    {
        return $this->hasOne(LoaiDiaDanh::class,'id', 'loai_dia_danh_id');
    }

     //Join 1-1
     public function thongTinUser()
     {
         return $this->hasOne(User::class,'id', 'user_id');
     }

     // localScope
     public function scopeSearchDeXuat($query)
     {
         if($key = request()->key) {
             $query = $query->where('ten_Diem','like','%'.$key.'%');
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
