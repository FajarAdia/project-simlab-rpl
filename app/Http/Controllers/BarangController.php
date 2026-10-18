<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;


class BarangController extends Controller
{
    public function create()
{
    $kategoris = Kategori::all();
    return view('barang.create', compact('kategoris'));
}

public function store(Request $request)
{
    // Validasi ketat sesuai ketentuan tugas
    $request->validate([
        'kategori_id' => 'required|exists:kategoris,id',
        'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang',
        'nama_barang' => 'required|string|min:3|max:150',
        'spesifikasi' => 'nullable|string',
        'stok' => 'required|integer|min:0',
        'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        'status' => 'required|in:Tersedia,Dipinjam,Maintenance',
    ]);

    // Simpan data ke database
    Barang::create($request->all());

    return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan!');
}
}
