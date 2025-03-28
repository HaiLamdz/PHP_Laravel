<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'reviews';
    protected $dates = 'deleted_at';
    protected $fillable = [
        'name', 'customer_id', 'product_id', 'rating', 'description', 'status'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
