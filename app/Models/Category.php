<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // để làm việc được với Factory ta phải sử dung thư viên HasFactory
    use HasFactory;
    // Muốn model làm việc với bảng nào ta cần quy định trong thuộc tính
    protected $table = 'categories';
    // Muốn làm việc với Eloquent thì ta cần xác định các trường dữ liệu vào fillable
    protected $fillable = [
        'ten_danh_muc',
        'trang_thai'
    ];

    // taoj mối quan hệ với Product
    public function product(){
        return $this->hasMany(Product::class);
    }
}
