<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mien extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ten_Mien'
    ];

    public function thongTinDiaDanh()
    {
        return $this->hasMany(DiaDanh::class,'mien_id', 'id');
    }
}
