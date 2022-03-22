<?php

namespace App\Models;
// Đây là hình bài viết ! lưu ý 
// Man update 31/01/2022
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaiViet;

class HinhBaiViet extends Model
{
    use HasFactory;

    protected $fillable = [
        'bai_viet_id' ,
        'img'
    ];

    public function hinhbaiviet(){  // Man update 31/01/2022 1 hinh anh se thuoc nhieu bai viet
        return $this->belongsTo(BaiViet::class);
    }
}
