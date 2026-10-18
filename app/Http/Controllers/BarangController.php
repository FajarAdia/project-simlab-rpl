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

public function index()
{
    // Mengambil data barang beserta relasi kategori, diurutkan dari terbaru
    $barangs = Barang::with('kategori')->latest()->get();
    return view('barang.index', compact('barangs'));
}

public function dashboard()
{
    // Menghitung metrik total aset untuk ringkasan dashboard
    $totalBarang = Barang::count();
    $totalStok = Barang::sum('stok');
    $barangTersedia = Barang::where('status', 'Tersedia')->count();
    $barangDipinjam = Barang::where('status', 'Dipinjam')->count();
    $barangMaintenance = Barang::where('status', 'Maintenance')->count();

    return view('dashboard', compact(
        'totalBarang', 
        'totalStok', 
        'barangTersedia', 
        'barangDipinjam', 
        'barangMaintenance'
    ));
}

public function edit($id)
{
    $barang = Barang::findOrFail($id);
    $kategoris = Kategori::all();
    return view('barang.edit', compact('barang', 'kategoris'));
}

public function update(Request $request, $id)
{
    $barang = Barang::findOrFail($id);

    // Validasi data (untuk kode_barang, abaikan pengecekan unique untuk ID barang yang sedang diedit)
    $request->validate([
        'kategori_id' => 'required|exists:kategoris,id',
        'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang,' . $barang->id,
        'nama_barang' => 'required|string|min:3|max:150',
        'spesifikasi' => 'nullable|string',
        'stok' => 'required|integer|min:0',
        'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        'status' => 'required|in:Tersedia,Dipinjam,Maintenance',
    ]);

    // Perbarui data barang
    $barang->update($request->all());

    return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui!');
}

public function destroy($id)
{
    $barang = Barang::findOrFail($id);
    $barang->delete();

    return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus!');
}
}
