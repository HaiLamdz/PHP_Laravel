<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $datas = ['delete_at'];
    protected $fillable = [
        'ma_san_pham',
        'ten_san_pham',
        'category_id',
        'hinh_anh',
        'gia_san_pham',
        'gia_khuyen_mai',
        'so_luong',
        'ngay_nhap',
        'mo_ta',
        'trang_thai',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function review(){
        return $this->hasMany(Review::class, 'product_id');
    }
}
