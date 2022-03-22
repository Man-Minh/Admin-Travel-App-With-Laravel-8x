<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LoaiDiaDanh;
use App\Models\Mien;
use App\Models\PhanVung;
use App\Models\BaiViet;
use App\Models\HinhDiaDiem;
use Illuminate\Database\Eloquent\SoftDeletes; // update

class DiaDanh extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'loai_dia_danh_id',
        'mien_id',
        'phan_vung_id',
        'ten_dia_danh',
        'ten_Goi_Khac',
        'mo_Ta',
        'kinh_Do',
        'vi_Do',
        'hot',
        'status',
        'deleted_at'
    ];

    public function loaidiadanh(){
        return $this->belongsTo(DiaDanh::class);
    }

    public function baiviets(){
        return $this->hasMany(BaiViet::class);
    }

    public function miens(){
        return $this->belongsTo(Mien::class);
    }

    public function phanvung(){
        return $this->belongsTo(PhanVung::class);
    }

    public function hinhdiadiem(){
        return $this->hasMany(HinhDiaDiem::class);
    }
 
    //Join 1-1
    public function thongTinLoaiDiaDanh()
    {
        return $this->hasOne(LoaiDiaDanh::class,'id', 'loai_dia_danh_id');
    }

    public function thongTinMien()
    {
        return $this->hasOne(Mien::class,'id', 'mien_id');
    }

    public function thongTinVung()
    {
        return $this->hasOne(PhanVung::class,'id', 'phan_vung_id');
    }

    public function thongTinHinh()
    {
        return $this->hasMany(HinhDiaDiem::class,'dia_danh_id', 'id');
    }

    // localScope
    public function scopeSearchDiaDanh($query)
    {
        if($key = request()->key) {
            if($loai = LoaiDiaDanh::where('ten_Loai','=',$key)->first())
            {
                $query = $query->where('loai_dia_danh_id','=', $loai->id);
                return $query;
            }
            if($mien = Mien::where('ten_Mien','=',$key)->first())
            {
                $query = $query->where('mien_id','=', $mien->id);
                return $query;
            }
            if($PVung = PhanVung::where('ten_Vung','=',$key)->first())
            {
                $query = $query->where('phan_vung_id','=', $PVung->id);
                return $query;
            }
            $query = $query->where('ten_dia_danh','like','%'.$key.'%');
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
