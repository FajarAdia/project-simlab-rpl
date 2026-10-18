<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

public function run(): void
{
    $kategoris = [
        ['nama_kategori' => 'Komputer & Laptop', 'deskripsi' => 'Perangkat komputer dan laptop praktikum siswa'],
        ['nama_kategori' => 'Perangkat Jaringan', 'deskripsi' => 'Router, switch, dan akses poin lab'],
        ['nama_kategori' => 'Alat Perkabelan', 'deskripsi' => 'Kabel LAN, konektor, dan crimping tool'],
        ['nama_kategori' => 'Multimedia', 'deskripsi' => 'Proyektor, layar, dan perangkat audio'],
    ];

    foreach ($kategoris as $kategori) {
        Kategori::create($kategori);
    }
}
}
