<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('customers')->insert([
        //     [
        //         'name' => 'Tạ văn Định',
        //         'age' => 20,
        //         'email' => 'dinhtv7@gmail.com',
        //         'password' => 12345678,
        //         'gender' => 'Nam',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'name' => 'Vũ Hải Lam',
        //         'age' => 20,
        //         'email' => 'vuhailam2112@gmail.com',
        //         'password' => 12345678,
        //         'gender' => 'Nữ',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        //     [
        //         'name' => 'Nguyễn Văn A',
        //         'age' => 20,
        //         'email' => 'abc@gmail.com',
        //         'password' => 12345678,
        //         'gender' => 'Nam',
        //         'status' => true,
        //         'created_at' => now()
        //     ],
        // ]);

        Customer::factory()->count(10)->create();
    }
}
