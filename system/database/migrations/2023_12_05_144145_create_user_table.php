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
        Schema::create('user', function (Blueprint $table) {
            $table->uuid('user_id')->primary();
            $table->text('nama')->nullable();
            $table->text('email')->nullable();
            $table->text('rfid')->nullable();
            $table->text('foto')->nullable();
            $table->text('password')->nullable();
            $table->integer('flag_erase')->default(1);
            $table->integer('level')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
