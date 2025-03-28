<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('posts')->insert([
        //     [
        //         'title' => 'title 1',
        //         'image' => 'ảnh',
        //         'description' => 'mô tả nội dung',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'title' => 'title 2',
        //         'image' => 'ảnh',
        //         'description' => 'mô tả nội dung',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'title' => 'title 3',
        //         'image' => 'ảnh',
        //         'description' => 'mô tả nội dung',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        // ]);

        Post::factory()->count(10)->create();
    }
}
