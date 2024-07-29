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
        Schema::create('kategori_peringatan', function (Blueprint $table) {
            $table->uuid('kategori_peringatan_id')->primary();
            $table->text('kategori_peringatan_nama')->nullable();
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_peringatan');
    }
};
