<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('products')->insert([
        //     [
        //         'ma_san_pham' => 'SP01',
        //         'ten_san_pham' => 'Áo',
        //         'category_id' => 1,
        //         'gia_san_pham' => 1500000,
        //         'gia_khuyen_mai' => 1200000,
        //         'so_luong' => 50,
        //         'ngay_nhap' => '2025-03-15',
        //         'mo_ta' => 'Mô tả Áo',
        //         'trang_thai' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'ma_san_pham' => 'SP02',
        //         'ten_san_pham' => 'Quần',
        //         'category_id' => 2,
        //         'gia_san_pham' => 1600000,
        //         'gia_khuyen_mai' => 1500000,
        //         'so_luong' => 50,
        //         'ngay_nhap' => '2025-03-15',
        //         'mo_ta' => 'Mô tả Quần',
        //         'trang_thai' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'ma_san_pham' => 'SP03',
        //         'ten_san_pham' => 'Mũ',
        //         'category_id' => 3,
        //         'gia_san_pham' => 1700000,
        //         'gia_khuyen_mai' => 1600000,
        //         'so_luong' => 50,
        //         'ngay_nhap' => '2025-03-15',
        //         'mo_ta' => 'Mô tả Mũ',
        //         'trang_thai' => true,
        //         'created_at' => now()
        //     ],
        // ]);

        // Category::factory()->count(5)->create()->each(function($category){
        //     Product::factory()->count(10)->create(['category_id' => $category->id]);
        // });
    }
}
