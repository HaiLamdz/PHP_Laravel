<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('categories')->insert([
        //     [
        //         'ten_danh_muc' => 'Áo',
        //         'trang_thai' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'ten_danh_muc' => 'Quần',
        //         'trang_thai' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'ten_danh_muc' => 'Mũ',
        //         'trang_thai' => true,
        //         'created_at' => now()
        //     ],
        // ]);

        Category::factory()->count(5)->create();
    }

    
}
