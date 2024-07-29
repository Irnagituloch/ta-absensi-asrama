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
        Schema::create('peringatan', function (Blueprint $table) {
            $table->uuid('peringatan_id')->primary();
            $table->text('peringatan_kategori_id')->nullable();
            $table->text('peringatan_user_id')->nullable();
            $table->text('peringatan_deskripsi')->nullable();
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peringatan');
    }
};
