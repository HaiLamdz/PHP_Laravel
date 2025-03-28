<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('banners')->insert([
        //     [
        //         'title' => 'Áo',
        //         'image' => 'ảnh',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'title' => 'Quần',
        //         'image' => 'ảnh',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'title' => 'Mũ',
        //         'image' => 'ảnh',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        // ]);

        Banner::factory()->count(10)->create();
    }
}
