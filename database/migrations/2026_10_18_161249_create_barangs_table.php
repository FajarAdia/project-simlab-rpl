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
    Schema::create('barangs', function (Blueprint $table) {
        $table->id(); // Primary Key
        $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade'); // Foreign Key ke tabel kategoris dengan cascade
        $table->string('kode_barang', 20)->unique(); // Kode registrasi unik (contoh: LAB-RPL-001)
        $table->string('nama_barang', 150); // Nama alat, minimal 3 karakter
        $table->text('spesifikasi')->nullable(); // Rincian spesifikasi teknis, opsional
        $table->integer('stok')->default(0); // Jumlah unit, default 0, tidak boleh negatif
        $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat']); // Kondisi fisik perangkat
        $table->enum('status', ['Tersedia', 'Dipinjam', 'Maintenance']); // Status ketersediaan alat
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
