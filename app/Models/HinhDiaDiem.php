<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // update

class HinhDiaDiem extends Model
{
    use HasFactory;
    use SoftDeletes;

     protected $fillable = [
        'id',
        'img',
        'dia_danh_id',
        'diem_luu_tru_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
