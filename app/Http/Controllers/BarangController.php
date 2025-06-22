<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BarangController extends Controller
{
   
  public function kategori(Request $request, $id_kategori)
    {
        $sort = $request->input('sort', 'relevansi');
        $query = Barang::query();

         if ($id_kategori && $id_kategori != 0) {
        $query->where('id_kategori', $id_kategori);
         }
        // Apply sorting
        switch ($sort) {
            case 'low_to_high':
                $query->orderBy('harga_per_hari', 'asc');
                break;
            case 'high_to_low':
                $query->orderBy('harga_per_hari', 'desc');
                break;
            default:
                $query->orderBy('id'); // Default sorting by ID (relevansi)
                break;
        }

        $data = $query->get();
        $kategoriNama = [
            1 => 'Berteduh',
            2 => 'Memasak',
            3 => 'Hiking',
            4 => 'Teknologi',
            5 => 'Survival',
        ];

        return view('konten', compact('data', 'kategoriNama', 'sort'));
    }

        

    // Tampilkan daftar semua barang di halaman 'konten'
    public function index()
    {
        $data = Barang::all(); // ambil semua data dari tabel barang
        return view('konten', compact('data')); // kirim data ke view
    }
    
    // public function kategori($id_kategori)
    // {
    // // Ambil semua barang yang id_kategorinya sesuai
    // $data = Barang::where('id_kategori', $id_kategori)->get();

    // // Kirim data ke view
    // return view('barang.kategori', compact('data', 'id_kategori'));
    // }

    // public function kategori($id_kategori)
    // {
    //     // Pastikan kolom 'id_kategori' ada di tabel 'barang' dan view 'barang.kategori' tersedia
    //     $data = Barang::where('id_kategori', $id_kategori)->get();
    //     return view('barang.kategori', compact('data', 'id_kategori'));
    // }

    // Tampilkan daftar barang di halaman 'daftar_barang'
    public function daftarbarang()
    {
        $data = Barang::all();
        return view('daftarbarang', compact('data'));
    }

    // Tampilkan daftar barang untuk penyewaan di halaman 'penyewaan'
    public function penyewaan()
    {
        $data = Barang::all();
        return view('penyewaan', compact('data'));
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

    // Tampilkan daftar barang berdasarkan id_kategori




} 
?>