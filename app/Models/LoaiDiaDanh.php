<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // update

class LoaiDiaDanh extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'ten_Loai',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Join 1-n
    public function diaDanh()
    {
        return $this->hasMany(DiaDanh::class,'loai_dia_danh_id', 'id');
    }

     // localScope
     public function scopeSearchLoaiDiaDanh($query)
     {
         if($key = request()->key) {
             $query = $query->where('ten_Loai','like','%'.$key.'%');
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
