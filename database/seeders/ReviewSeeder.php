<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('reviews')->insert([
        //     [
        //         'name' => 'dinhtv7',
        //         'customer_id' => 1,
        //         'product_id' => 1,
        //         'rating' => 5,
        //         'description' => 'mô tả nội dung',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'name' => 'lamvhph56233',
        //         'customer_id' => 2,
        //         'product_id' => 2,
        //         'rating' => 5,
        //         'description' => 'mô tả nội dung',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'name' => 'abcxyz',
        //         'customer_id' => 3,
        //         'product_id' => 3,
        //         'rating' => 5,
        //         'description' => 'mô tả nội dung',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        // ]);

        Review::factory()->count(10)->create();
    }
}
