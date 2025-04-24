<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamp('time')->useCurrent(); // hoặc bạn có thể dùng $table->dateTime('time')
            $table->decimal('numbercoin', 15, 2); // Số xu hiện tại của user
            $table->decimal('numbercoinmanager', 15, 2); // Số xu được nạp hoặc trừ
            $table->enum('type', ['plus', 'minus']); // Kiểu nạp hoặc trừ
            $table->string('note')->nullable(); // Ghi chú tùy chỉnh
            $table->string('type_note'); // Ví dụ: nạp tiền, đổi pass
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
