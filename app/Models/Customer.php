<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';
    protected $dates = 'deleted_at';
    protected  $fillable = [
        'name',
        'age',
        'email',
        'password',
        'gender',
        'status'
    ];

    public function review(){
        return $this->hasMany(Review::class, 'customer_id');
    }
}
