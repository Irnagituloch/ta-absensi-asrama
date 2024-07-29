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
        Schema::create('rfid_card', function (Blueprint $table) {
           $table->uuid('rfid_card_id')->primary();
           $table->text('rfid_card_number')->nullable();
           $table->text('rfid_card_mahasiswi_id')->nullable();
           $table->integer('flag_erase')->default(1);
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfid_card');
    }
};
