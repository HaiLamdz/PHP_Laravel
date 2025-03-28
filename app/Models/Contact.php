<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    // Muốn model làm việc với bảng nào ta cần quy định trong thuộc tính
    protected $table = 'contacts';
    protected $dates = 'deleted_at';
    // Muốn làm việc với Eloquent thì ta cần xác định các trường dữ liệu vào fillable
    protected $fillable = [
        'name',
        'email',
        'phone',
        'description',
        'status'
    ];
}
