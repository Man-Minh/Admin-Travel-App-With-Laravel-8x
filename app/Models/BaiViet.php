<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DiaDanh;
use App\Models\Like;
use App\Models\Dislike;
use App\Models\View;
use App\Models\HinhBaiViet;

class BaiViet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'dia_danh_id',
        'noi_Dung',
        'checked',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function diadanh(){
        return $this->belongsTo(DiaDanh::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function dislikes(){
        return $this->hasMany(Dislike::class);
    }

     public function views(){
        return $this->hasMany(View::class);
    }

     public function hinhbaiviet(){
        return $this->hasMany(HinhBaiViet::class);
    }

    public function thongTinUser() {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function thongTinDiaDanh()
    {
        return $this->hasOne(DiaDanh::class,'id','dia_danh_id');
    }

    //Join 1-n
    public function thongTinHinhAnh()
    {
        return $this->hasMany(HinhBaiViet::class,'bai_viet_id','id');
    }
    public function thongTinLuotThich()
    {
        return $this->hasMany(Like::class,'bai_viet_id','id');
    }

     // localScope
     public function scopeSearchBaiViet($query)
     {
         if($key = request()->key) {
             $infoUser = User::where('name','=',$key)->first();
             if($infoUser!=null)
             {
                $query = $query->where('user_id','=',$infoUser->id);
                return $query;
             }else{
                $infoDiaDanh = DiaDanh::where('ten_dia_danh','=',$key)->first();   
                if($infoDiaDanh!=null)
                {
                    $query = $query->where('dia_danh_id','=',$infoDiaDanh->id);
                    return $query;
                }
             }
         }
         else if($key1 = request()->keyfilterDesc) {
             $query = $query->orderBy($key1 , 'DESC');
             return $query;
         }
		 $query = $query->where('noi_Dung','like','%'.$key.'%');
         return $query;
     }

     public function scopeThongKeBaiVietTheoNgay($query1)
     {
         if($start = request()->start && $end = request()->end) {
             $query1 = $query1->whereBetween('created_at',[$start, $end])->get();
             return $query1;
            // return request()->start;
         }
        
         return '0' ;
     }
}
