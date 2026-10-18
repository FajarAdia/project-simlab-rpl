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
    Schema::create('kategoris', function (Blueprint $table) {
        $table->id(); // Primary Key, Auto Increment
        $table->string('nama_kategori', 50)->unique(); // Wajib diisi, unik, maksimal 50 karakter
        $table->text('deskripsi')->nullable(); // Deskripsi kategori, opsional
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};
