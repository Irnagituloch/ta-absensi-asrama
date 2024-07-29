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
        Schema::create('absensi', function (Blueprint $table) {
           $table->uuid('absensi_id')->primary();
           $table->text('absensi_user_id')->nullable();
           $table->text('absensi_rfid')->nullable();
           $table->time('absensi_jam')->nullable();
           $table->text('absensi_tanggal')->nullable();
           $table->text('absensi_bulan')->nullable();
           $table->text('absensi_tahun')->nullable();
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
