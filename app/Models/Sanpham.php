<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HinhanhSanpham;

class Sanpham extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'danhmuc_id',
        'thuonghieu_id',
        'price',
        'status',
        'description',
        'content'
    ];
    public function hinhanhs(){
        return $this->hasMany(HinhanhSanpham::class,'sanpham_id','id');
    }
}
