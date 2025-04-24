<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('zoom_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('pass');
            $table->string('key_host');
            $table->string('id_order');
            $table->string('zoom_user_id');
            $table->string('zoom_access_token');
            $table->string('zoom_refresh_token');
            $table->string('zoom_client_id');
            $table->string('zoom_client_secret');
            $table->string('zoom_account_id');
            $table->dateTime('deadline'); 
            $table->string('type');
            $table->enum('status', ['active', 'lock'])->default('active'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoom_accounts');
    }
};
