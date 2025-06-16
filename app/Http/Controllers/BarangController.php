<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::all(); // ambil semua data dari tabel barang
        return view('konten', compact('data')); // kirim data ke view
    }
    public function create()
    {
        return view('barang.create'); // tampilkan form untuk menambah barang
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'harga' => 'required|numeric',
    //         'deskripsi' => 'nullable|string',
    //         'stok' => 'required|integer|min:0',
    //     ]);
    //     Barang::create([
    //         'nama' => $request->nama,
    //         'harga' => $request->harga,
    //         'deskripsi' => $request->deskripsi,
    //         'stok' => $request->stok,
    //     ]);
    //     return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');

    // }
    // public function edit($id)
    // {
    //     $barang = Barang::findOrFail($id); // cari barang berdasarkan ID
    //     return view('barang.edit', compact('barang')); // tampilkan form untuk mengedit barang
    // }
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'harga' => 'required|numeric',
    //         'deskripsi' => 'nullable|string',
    //         'stok' => 'required|integer|min:0',
    //     ]);
    //     $barang = Barang::findOrFail($id); // cari barang berdasarkan ID
    //     $barang->update([
    //         'nama' => $request->nama,
    //         'harga' => $request->harga,
    //         'deskripsi' => $request->deskripsi,
    //         'stok' => $request->stok,
    //     ]);
    //     return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    // }
    // public function destroy($id)
    // {
    //     $barang = Barang::findOrFail($id); // cari barang berdasarkan ID
    //     $barang->delete(); // hapus barang
    //     return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    // }
    public function show($id)
    {
        $barang = Barang::findOrFail($id); // cari barang berdasarkan ID
        

      

        $barang->gambar = json_decode($barang->gambar);
        
          // Get other random products for recommendations
          $produkLainnya = Barang::where('id', '!=', $id)
          ->inRandomOrder()
          ->limit(4)
          ->get();
            
        return view('user.detail', compact('barang', 'produkLainnya')); // tampilkan detail barang
    }
}