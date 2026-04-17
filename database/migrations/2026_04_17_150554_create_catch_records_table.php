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
        Schema::create('catch_records', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masehi')->default(now()->toDateString());
            $table->unsignedTinyInteger('tanggal_jawa');
            $table->string('lokasi_blok');
            $table->decimal('hasil_kg', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catch_records');
    }
};
