<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SIMLAB-RPL</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard SIMLAB-RPL</h1>
            <a href="{{ route('barang.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold">Kelola Data Barang</a>
        </div>

        <!-- Kartu Metrik Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
                <p class="text-sm font-medium text-gray-500">Total Jenis Barang</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalBarang }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500">
                <p class="text-sm font-medium text-gray-500">Total Keseluruhan Stok Unit</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalStok }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                <p class="text-sm font-medium text-gray-500">Barang Tersedia</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $barangTersedia }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-400">
                <p class="text-sm font-medium text-gray-500">Barang Dipinjam</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $barangDipinjam }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-orange-500">
                <p class="text-sm font-medium text-gray-500">Barang Maintenance</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $barangMaintenance }}</p>
            </div>
        </div>
    </div>
</body>
</html>