<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    // Migration dùng để thao tác với csdl
    // Trong 1 file migration bắt buộc phải có UP và DOWN
    // Hàm UP thực hiện các công việc thay đổi hay cập nhật csdl
    // Hàm DOWN thực hiện các công việc ngược lại với hàm UP

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // xét độ dài và quy định giá trị không đưuọc trùng nhau
            $table->string('ma_san_pham', length: 20)->unique();
            $table->string('ten_san_pham');
            $table->decimal('gia_san_pham', 10, 2);
            // nullable cho phép nhập giá trị null
            $table->decimal('gia_khuyen_mai', 10, 2)->nullable();
            // unsignedInteger: số nguyên dương
            $table->unsignedInteger('so_luong');
            $table->date('ngay_nhap');
            $table->text('mo_ta')->nullable();
            $table->boolean('trang_thai')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
