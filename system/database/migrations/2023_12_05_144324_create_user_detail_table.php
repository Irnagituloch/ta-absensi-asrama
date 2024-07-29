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
        Schema::create('user_detail', function (Blueprint $table) {
            $table->uuid('user_detail_id')->primary();
            $table->text('user_id')->nullable();
            $table->text('user_jurusan')->nullable();
            $table->text('user_alamat')->nullable();
            $table->text('user_nama_orangtua')->nullable();
            $table->text('user_tgl_masuk')->nullable();
            $table->text('user_notlp_orangtua')->nullable();
            $table->text('user_notlp')->nullable();
            $table->text('user_no_kamar')->nullable();
            $table->text('nik')->nullable();
            $table->text('nim')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_detail');
    }
};
