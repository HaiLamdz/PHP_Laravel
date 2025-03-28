<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('contacts')->insert([
        //     [
        //         'name' => 'Tạ văn Định',
        //         'email' => 'dinhtv7@gmail.com',
        //         'phone' => '0123456789',
        //         'description' => 'mô tả nội dung',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'name' => 'Vũ Hải Lam',
        //         'email' => 'vuhailam2112@gmail.com',
        //         'phone' => '0123456789',
        //         'description' => 'mô tả nội dung',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'name' => 'Nguyễn Văn A',
        //         'email' => 'abc@gmail.com',
        //         'phone' => '0123456789',
        //         'description' => 'mô tả nội dung',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        // ]);
        Contact::factory()->count(10)->create();
    }
}
